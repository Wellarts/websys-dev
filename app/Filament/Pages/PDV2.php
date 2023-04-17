<?php

namespace App\Filament\Pages;

use App\Models\Produto;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Pages\Page;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Models\PDV as ModelsPDV;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PDV2 extends Page implements HasForms, HasTable 
{

    use InteractsWithForms, InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.p-d-v2';

    public $produto;
    public $valor_venda;
    public $qtd;
    public $acres_desc;
    public $sub_total;
    public $data;

    protected $listeners = ['PDV' => '$refresh'];


    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array 
    {
        return [
            Card::make()
                ->schema([
                    Forms\Components\Select::make('produto_id')
                        ->options(Produto::all()->pluck('codebar', 'id')->toArray())
                        ->reactive()
                        ->label('Produto')
                        ->afterStateUpdated(function ($state) {
    
                            $produto = Produto::find($state);
                            
                            $model = ModelsPDV::create([
                                'produto_id' => $state,
                                'valor_venda' => $produto->valor_venda,
                            ]);
                  }),
         ])->columns(1)
          
                    
        ];
                
     } 
    
    protected function getTableQuery(): Builder
    {
       
        return ModelsPDV::query();
    } 

    protected function getTableColumns(): array
    {
        return [
          
                Tables\Columns\TextColumn::make('produto.nome')
                     ->label('Produtos'),
                Tables\Columns\TextColumn::make('qtd')
                    ->label('Quantidade'),
                Tables\Columns\TextColumn::make('valor_venda')
                     ->label('Valor Unitário')
                     ->money('BRL'),
                Tables\Columns\TextColumn::make('sub_total')
                     ->label('Sub-Total')
                     ->money('BRL'),
       ];
    }
}
