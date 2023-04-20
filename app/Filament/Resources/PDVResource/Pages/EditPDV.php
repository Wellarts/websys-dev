<?php

namespace App\Filament\Resources\PDVResource\Pages;

use App\Filament\Resources\PDVResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;


class EditPDV extends EditRecord
{
    protected static string $resource = PDVResource::class;

    protected static ?string $title = 'Editar item do PDV';

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
