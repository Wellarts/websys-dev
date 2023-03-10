<?php

namespace App\Filament\Resources\VendaResource\Widgets;

use App\Models\Venda;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class VendaStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {

        $mes = date('m');
        $dia = date('d');
        return [
            Card::make('Total de Vendas', Venda::all()->sum('valor_total'))
                ->description('Todo Perído')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Total de Vendas', DB::table('vendas')->whereMonth('data_venda', $mes)->sum('valor_total'))
                ->description('Este mês')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Total de Vendas', DB::table('vendas')->whereDay('data_venda', $dia)->sum('valor_total'))
                ->description('Hoje')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
        ];
    }
}
