<?php

namespace App\Filament\Resources\AssetConditionResource\Pages;

use App\Filament\Resources\AssetConditionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetConditions extends ListRecords
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
            Actions\CreateAction::make(),
        ];
    }
}
