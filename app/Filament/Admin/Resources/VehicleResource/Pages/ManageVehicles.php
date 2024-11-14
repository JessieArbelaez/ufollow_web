<?php

namespace App\Filament\Admin\Resources\VehicleResource\Pages;

use App\Filament\Admin\Resources\VehicleResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVehicles extends ManageRecords
{
    protected static string $resource = VehicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
