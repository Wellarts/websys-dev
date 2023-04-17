<x-filament::page>
    <div>{{$this->form}}</div>  
    <div>{{$this->table}}</div>
    <div class="float-right"> TOTAL: R$ {{($this->getTableRecords()->sum('sub_total'))}} </div>
</x-filament::page>


