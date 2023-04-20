<?php

namespace App\Filament\Pages;

use App\Filament\Resources\PDVResource;
use App\Models\Produto;
use Filament\Forms\Components\Card;
use Filament\Pages\Page;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Models\PDV;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Actions\Modal\Actions\Action;
use Filament\Notifications\Collection;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Builder;


class PDV2 extends Page implements HasForms, HasTable 
{

    use InteractsWithForms, InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.p-d-v2';

    protected static ?string $title = 'PDV';

    protected static ?string $slug = 'PDV';

    
    
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
                        ->options(Produto::pluck('codebar', 'id'))
                        ->reactive()
                        ->searchable()
                        ->label('Produto'),
       
                ])->columns(2)
        ];

                        
     } 


     public function updated($name, $value): void
    {
            if ($name === 'produto_id') {

                $produto = Produto::find($value);
                                    
                $model = PDV::create([
                    'produto_id' => $value,
                    'valor_venda' => $produto->valor_venda,
                    'qtd' => 1,
                    'sub_total' => $produto->valor_venda * 1,
                ]);
            }
    }
    
    protected function getTableQuery(): Builder
    {
       
        return PDV::query();
    } 

    protected function getTableColumns(): array
    {
        return [
          
                Tables\Columns\TextColumn::make('produto.nome'),
                         
                
           
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

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('Editar')
                ->url(fn (PDV $record): string => PDVResource::getUrl('edit', ['record' => $record]))
                ->requiresConfirmation(),
            Tables\Actions\DeleteAction::make('Excluir'),
  
        ];
        
    }

    protected function getTableHeaderActions(): array
    {
        return [
           
                
                
                
        ];
    }
    
    protected function getSubmitFormAction(): Action
        {
            $disabled = $this->data && $this->data['my_field'] ? false : true;

            return Action::make('save')
                ->label('Save Recipients')
                ->disabled($disabled)
                ->submit('save')
                ->keyBindings(['mod+s']);
        }

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('set_new_delivery_date')
                ->label(__('admin-panel.bulk-action.set-new-delivery-date.label'))
                ->modalHeading(__('admin-panel.bulk-action.set-new-delivery-date.heading'))
                ->modalSubheading(__('admin-panel.bulk-action.set-new-delivery-date.subheading'))
                ->modalButton(__('admin-panel.bulk-action.set-new-delivery-date.button'))
                ->icon('heroicon-o-calendar')
                ->action(
                    fn(Collection $records, $data) => $records->each->updateScheduleDate(
                        Carbon::create($data['schedule_date'])
                    )
                )
                ->deselectRecordsAfterCompletion()
                ->form([
                    Forms\Components\DatePicker::make('schedule_date')->displayFormat('D d.m.Y')
                        ->default(now()),
                ])
                ->requiresConfirmation(),
        ];
    }

   

    
}
