<?php

namespace App\Filament\Resources\AssetResource\Pages;

use App\Filament\Resources\AssetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAsset extends CreateRecord
{
    protected static string $resource = AssetResource::class;

    /**
     * Mutates the form data before creating a new record.
     *
     * @param array<string, int|string|null> $data The form data to be mutated.
     * @return array<string, int|string|null> The mutated form data.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['owner_id'] = auth()->id();
        return $data;
    }
}
