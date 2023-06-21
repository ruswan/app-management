<?php

namespace App\Filament\Resources\ProductionYearResource\Pages;

use App\Filament\Resources\ProductionYearResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductionYears extends ListRecords
{
    protected static string $resource = ProductionYearResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
