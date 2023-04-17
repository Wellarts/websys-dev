<?php

namespace App\Http\Livewire;

use App\Models\PDV as ModelsPDV;
use App\Models\Produto;
use Closure;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Grid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;

class PDV extends Component implements HasForms, HasTable 
{
    use InteractsWithForms, InteractsWithTable;

    public PDV $pdv;

    public $produto;
    public $valor_venda;
    public $qtd;
    public $acres_desc;
    public $sub_total;

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
                        ->searchable()
                        ->reactive()
                        ->label('Produto')
                        ->afterStateUpdated(function ($state, callable $set, Closure $get) {
                            $produto = Produto::find($state);
                        
                            if($produto) {
                                $set('valor_venda', $produto->valor_venda);
                                $set('valor_custo_atual', $produto->valor_compra);
                                $set('sub_total', (($get('qtd') * $get('valor_venda')) + (float)$get('acres_desc')));
                                $set('estoque_atual', $produto->estoque);
                                $set('total_custo_atual', $get('valor_custo_atual') * $get('qtd'));
                                
                            }

                             $PDV = ModelsPDV::create($this->form->getState());
                             return redirect(request()->header('Referer'));
                            
                        }
                    ),
            Forms\Components\Hidden::make('qtd')
                ->default('1'),
            Forms\Components\Hidden::make('valor_venda'),
            Forms\Components\Hidden::make('acres_desc')
                ->default('0')
                ->label('Descontos/Acréscimo'),
            Forms\Components\Hidden::make('sub_total'),
                  
        ])->columns(1)
          //  ->extraAttributes(['wire:change' => 'PDV'])
                    
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

    

    public function render()
    {
        
        return view('livewire.p-d-v');
    }
}
