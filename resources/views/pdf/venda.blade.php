<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Comprovante de Venda</title>
</head>
<body >
<div class="container-sm">
    <h2>Comprovante de venda</h2>
</div>

    <div class="container-sm">
                <table class="table table-hover">
                    <thead align="center">
                        <td><b>Venda</b></td>
                        <td><b>Cliente</b></td>
                        <td><b>Data</b></td>
                        <td><b>Forma de Pagamento</b></td>
                        <td><b>Valor Total</b></td>
                    </thead>
                    <tbody align="center">
                        <td>{{$vendas->id}}</td>
                        <td>{{$vendas->cliente->nome}}</td>
                        <td>{{$vendas->data_venda}}</td>
                        <td>{{$vendas->formaPgmto->nome}}</td>
                        <td><label>R$</label> {{$vendas->valor_total}}</td>
                   
                    <tr>
                    <td colspan="5">
                        <table class="table table-bordered">
                            <tr>
                                    <thead align="center">
                                        <td><b>Produto</b></td>
                                        <td><b>Valor</b></td>
                                        <td><b>Qtd</b></td>
                                        <td><b>Desco/Acres</b></td>
                                        <td><b>SubTotal</b></td>
                                    </thead>
                                </tr>
                            <tr>                 
                                    <tbody align="center">
                                        @foreach ($vendas->itensVenda as $itens)
                                            <tr> 
                                                    <td>{{$itens->produto->nome}}</td>
                                                    <td><label>R$</label> {{$itens->valor_venda}}</td>
                                                    <td>{{$itens->qtd}}</td>
                                                    <td><label>R$</label> {{$itens->desc_acres}}</td>
                                                    <td><label>R$</label> {{$itens->sub_total}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>    
                            </tr>    
                                
                            </table>
                        </td>
                    </tr>
                       
                </tbody>
            </table>
    </div> 
       
    
</body>
</html>




