<?php

namespace App\Filament\Resources\AssetConditionResource\Pages;

use App\Filament\Resources\AssetConditionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetCondition extends ViewRecord
{
    protected static string $resource = AssetConditionResource::class;

    /**
     * Mendapatkan daftar objek aksi yang tersedia untuk digunakan.
     *
     * @return array<Actions\Action> Daftar objek aksi.
     */
    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
