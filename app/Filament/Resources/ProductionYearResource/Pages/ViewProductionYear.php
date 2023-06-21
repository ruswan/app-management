<?php

namespace App\Filament\Resources\ProductionYearResource\Pages;

use App\Filament\Resources\ProductionYearResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductionYear extends ViewRecord
{
    protected static string $resource = ProductionYearResource::class;

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
