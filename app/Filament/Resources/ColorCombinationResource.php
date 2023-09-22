<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColorCombinationResource\Pages;
use App\Filament\Resources\ColorCombinationResource\RelationManagers;
use App\Models\ColorCombination;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColorCombinationResource extends Resource
{
    protected static ?string $model = ColorCombination::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    protected static ?string $activeNavigationIcon = 'heroicon-s-swatch';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Colors';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Color Combination')
                    ->description('Fill in the fields below to create a new color combination.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\ColorPicker::make('text_color')
                                    ->label('Text Color')
                                    ->required(),
                                Forms\Components\ColorPicker::make('bg_color')
                                    ->label('Background Color')
                                    ->required()
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ColorColumn::make('text_color')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('bg_color')
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListColorCombinations::route('/'),
            'create' => Pages\CreateColorCombination::route('/create'),
            'edit' => Pages\EditColorCombination::route('/{record}/edit'),
        ];
    }
}
