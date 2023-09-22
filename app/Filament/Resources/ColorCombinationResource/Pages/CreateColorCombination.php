<?php

namespace App\Filament\Resources\ColorCombinationResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ColorCombinationResource;
use App\Models\ColorCombination;

class CreateColorCombination extends CreateRecord
{
    protected static string $resource = ColorCombinationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
