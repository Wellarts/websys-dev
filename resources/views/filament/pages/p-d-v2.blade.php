<x-filament::page>
    <div>{{$this->form}}
        <div class="float-right"> TOTAL: R$ {{($this->getTableRecords()->sum('sub_total'))}} </div>
    </div>  
    <div>{{$this->table}}</div>
    <div class="float-right"> TOTAL: R$ {{($this->getTableRecords()->sum('sub_total'))}} </div>


</x-filament::page>


