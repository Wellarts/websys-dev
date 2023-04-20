<?php

namespace App\Filament\Resources\PDVResource\Pages;

use App\Filament\Resources\PDVResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPDVS extends ListRecords
{
    protected static string $resource = PDVResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
