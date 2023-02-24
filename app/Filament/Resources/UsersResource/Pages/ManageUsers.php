<?php

namespace App\Filament\Resources\UsersResource\Pages;

use App\Filament\Resources\UsersResource;
use App\Filament\Resources\UsersResource\Widgets\UsersOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Str;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UsersResource::class;

    protected static ?string $footer = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UsersOverview::class,
        ];
    }

    public function updated($name): void
    {
        $mes = date('m');
        $dia = date('d');

        if (Str::of($name)->contains('tableFilter')) {
            $this->emit('updateWidget', $this->tableFilters);
        }
    }
}
