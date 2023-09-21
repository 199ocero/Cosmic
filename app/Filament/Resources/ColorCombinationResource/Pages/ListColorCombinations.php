<?php

namespace App\Filament\Resources\ColorCombinationResource\Pages;

use App\Filament\Resources\ColorCombinationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColorCombinations extends ListRecords
{
    protected static string $resource = ColorCombinationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Color Combination')
                ->icon('heroicon-o-plus'),
        ];
    }
}
