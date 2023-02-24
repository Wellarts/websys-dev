<?php

namespace App\Filament\Resources\UsersResource\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class UsersOverview extends Widget
{
    public $filters = null;

    protected static string $view = 'filament.resources.users-resource.widgets.users-overview';

    protected $listeners = ['updateWidget' => 'getFilters'];

    public function getFilters($data)
    {
        $this->filters = $data;

        $mes = date('m');
        $dia = date('d');

        
    }
}
