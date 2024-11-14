<?php

namespace App\Filament\Admin\Resources\DrivingLicenseResource\Pages;

use App\Filament\Admin\Resources\DrivingLicenseResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDrivingLicenses extends ManageRecords
{
    protected static string $resource = DrivingLicenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
