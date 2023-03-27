<?php

namespace App\Filament\Pages;

use App\Filament\Resources\CompraResource\Widgets\ComprasMesChart;
use App\Filament\Resources\VendaResource\Widgets\VendasMesChart;
use App\Filament\Widgets\PagarHojeStatsOverview;
use App\Filament\Widgets\ReceberHojeStatsOverview;
use App\Models\Config;
use App\Models\User;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Widgets\AccountWidget;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Filament\Notifications\Actions\Action;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';





    protected function getHeaderWidgets(): array
    {

        return [
            AccountWidget::class,
            PagarHojeStatsOverview::class,
            ReceberHojeStatsOverview::class,
            VendasMesChart::class,
            ComprasMesChart::class,


        ];
    }


   

}
