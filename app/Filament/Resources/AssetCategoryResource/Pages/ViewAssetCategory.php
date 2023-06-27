<?php

namespace App\Filament\Resources\AssetCategoryResource\Pages;

use App\Filament\Resources\AssetCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetCategory extends ViewRecord
{
    protected static string $resource = AssetCategoryResource::class;

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
