<?php

namespace App\Filament\Admin\Resources\DriverResource\Pages;

use App\Filament\Admin\Resources\DriverResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDrivers extends ManageRecords
{
    protected static string $resource = DriverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
