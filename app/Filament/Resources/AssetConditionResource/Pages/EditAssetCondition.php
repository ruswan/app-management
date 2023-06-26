<?php

namespace App\Filament\Resources\AssetConditionResource\Pages;

use App\Filament\Resources\AssetConditionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetCondition extends EditRecord
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
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
