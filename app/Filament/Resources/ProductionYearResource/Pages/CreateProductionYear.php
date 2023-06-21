<?php

namespace App\Filament\Resources\ProductionYearResource\Pages;

use App\Filament\Resources\ProductionYearResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductionYear extends CreateRecord
{
    protected static string $resource = ProductionYearResource::class;
}
