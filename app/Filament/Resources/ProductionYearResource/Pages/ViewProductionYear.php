<?php

namespace App\Filament\Resources\ProductionYearResource\Pages;

use App\Filament\Resources\ProductionYearResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductionYear extends ViewRecord
{
    protected static string $resource = ProductionYearResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
