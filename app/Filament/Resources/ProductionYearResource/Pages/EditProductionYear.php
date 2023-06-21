<?php

namespace App\Filament\Resources\ProductionYearResource\Pages;

use App\Filament\Resources\ProductionYearResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductionYear extends EditRecord
{
    protected static string $resource = ProductionYearResource::class;

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
