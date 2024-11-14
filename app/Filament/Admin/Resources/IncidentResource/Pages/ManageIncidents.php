<?php

namespace App\Filament\Admin\Resources\IncidentResource\Pages;

use App\Filament\Admin\Resources\IncidentResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageIncidents extends ManageRecords
{
    protected static string $resource = IncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
