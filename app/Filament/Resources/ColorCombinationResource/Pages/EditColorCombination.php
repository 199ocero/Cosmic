<?php

namespace App\Filament\Resources\ColorCombinationResource\Pages;

use Filament\Actions;
use App\Models\ColorCombination;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ColorCombinationResource;

class EditColorCombination extends EditRecord
{
    protected static string $resource = ColorCombinationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if ($data['default']) {
            ColorCombination::query()->update(['default' => false]);
        }

        $record->update($data);

        return $record;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
