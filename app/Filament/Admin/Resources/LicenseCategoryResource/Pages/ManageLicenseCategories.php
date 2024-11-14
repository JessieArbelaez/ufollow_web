<?php

namespace App\Filament\Admin\Resources\LicenseCategoryResource\Pages;

use App\Filament\Admin\Resources\LicenseCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLicenseCategories extends ManageRecords
{
    protected static string $resource = LicenseCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
