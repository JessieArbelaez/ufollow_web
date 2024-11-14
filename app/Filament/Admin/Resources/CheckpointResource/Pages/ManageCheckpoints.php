<?php

namespace App\Filament\Admin\Resources\CheckpointResource\Pages;

use App\Filament\Admin\Resources\CheckpointResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCheckpoints extends ManageRecords
{
    protected static string $resource = CheckpointResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
