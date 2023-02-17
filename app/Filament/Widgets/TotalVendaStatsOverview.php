<?php

namespace App\Filament\Widgets;

use App\Models\ItensVenda;
use App\Models\Venda;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Database\Eloquent\Model;

class TotalVendaStatsOverview extends BaseWidget
{

    public ?Model $record = null;


    protected function getCards(): array
    {

        $mes = date('m');
        $dia = date('d');
        return [
            Card::make('Valor Total da Venda', Venda::all()->where('id', $this->record->id)->sum('valor_total'))
                ->description('Itens da Venda')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
         /*   Card::make('Total de Vendas', DB::table('vendas')->whereMonth('data_venda', $mes)->sum('valor_total'))
                ->description('Este mês')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Total de Vendas', DB::table('vendas')->whereDay('data_venda', $dia)->sum('valor_total'))
                ->description('Hoje')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'), */
        ];
    }
}
