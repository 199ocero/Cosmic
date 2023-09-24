<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Model;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    protected static ?string $activeNavigationIcon = 'heroicon-s-squares-plus';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Categories';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(debounce: 500)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('color')
                    ->options(collect(Color::all())
                        ->mapWithKeys(fn ($color, $name) => [$name . '-' . $color[500] => "<div class='flex items-center justify-between gap-4'>
                        <div class='w-4 h-4' style='background:rgb(" . $color[500] . ")'></div>
                        <span>" . str($name)->title() . '</span>
                        </div>']))
                    ->allowHtml()
                    ->native(false),
            ])
            ->columns('full');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state, Model $record): string => match ($state) {
                        $record->title => $record->color_name,
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('color_code')
                    ->label('Color Preview'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateRecordDataUsing(function (array $data): array {
                        $data['color'] = $data['color_name'] . '-' . $colorCode = Str::between($data["color_code"], "(", ")");

                        return $data;
                    })
                    ->using(function (Model $record, array $data): Model {
                        $colorParts = explode('-', $data["color"]);
                        $data['color_name'] = trim($colorParts[0]);
                        $data['color_code'] = "rgb(" . $colorParts[1] . ")";
                        unset($data["color"]);
                        $record->update($data);

                        return $record;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategories::route('/'),
        ];
    }
}
