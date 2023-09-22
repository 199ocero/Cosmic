<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\CategoryResource;

class ManageCategories extends ManageRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Category')
                ->icon('heroicon-o-plus')
                ->mutateFormDataUsing(function (array $data): array {
                    $colorParts = explode('-', $data["color"]);
                    $data['color_name'] = trim($colorParts[0]);
                    $data['color_code'] = "rgb(" . $colorParts[1] . ")";
                    unset($data["color"]);
                    return $data;
                }),
        ];
    }
}
