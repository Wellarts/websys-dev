<?php

namespace App\Http\Livewire;

use App\Models\PDV;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EditPDV extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
 
    public PDV $pdv;
 
    public $qtd;
    public $valor_venda;
 
    public function mount(): void
    {
        $this->form->fill([
            'qtd' => $this->pdv->qtd ?? [],
            'valor_venda' => $this->pdv->valor_venda ?? [],
        ]);
    }
 
    protected function getFormSchema(): array 
    {
        return [
            Forms\Components\TextInput::make('qtd'),
            Forms\Components\TextInput::make('valor_venda'),

           
            // ...
        ];
    } 

    public function submit(): void
    {
        $this->pdv->update($this->form->getState());
        $this->form->getState();
    }
 
    

    public function render()
    {
        return view('livewire.edit-p-d-v');
    }
}
