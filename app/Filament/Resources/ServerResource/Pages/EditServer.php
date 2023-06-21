<?php

namespace App\Filament\Resources\ServerResource\Pages;

use App\Filament\Resources\ServerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServer extends EditRecord
{
    protected static string $resource = ServerResource::class;

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
