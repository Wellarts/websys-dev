 
    <div class="container mx-auto px-18"> 
        <div class="basis-1/2">
            <h1> PDV - PONTO DE VENDA -  EXPRESS </h1>
        </div>    
       <div>
            <form>
                <div>{{$this->form}}</div>  
            </form>
        </div>
        <div>Itens da Venda</div>
        <div>{{$this->table}}</div>
        <div class="float-right"> TOTAL: R$ {{($this->getTableRecords()->sum('sub_total'))}} </div>
    </div>


    

    


    
  
    




            










