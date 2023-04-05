<?php

namespace App\Filament\Resources\ConfigResource\Pages;

use App\Filament\Resources\ConfigResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageConfigs extends ManageRecords
{
    protected static string $resource = ConfigResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
