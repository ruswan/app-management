<?php

namespace App\Filament\Resources\ProjectTypeResource\Pages;

use App\Filament\Resources\ProjectTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectType extends EditRecord
{
    protected static string $resource = ProjectTypeResource::class;

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
