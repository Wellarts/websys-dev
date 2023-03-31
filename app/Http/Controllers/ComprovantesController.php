<?php

namespace App\Http\Controllers;

use App\Models\ItensVenda;
use Illuminate\Http\Request;
Use App\Models\Venda;
use Barryvdh\DomPDF\Facade\Pdf;

class ComprovantesController extends Controller
{
    
    public function geraPdf($id)
    
    {

        $vendas = Venda::find($id);
      //  $registros = Venda::with('categoria')->get();    
       
        
        
     //  $pdf = Pdf::loadView('pdf.venda', compact(['vendas']))->stream();

      

    //   return $pdf->stream($pdf.'.pdf');

       $view = view('pdf.venda', compact(['vendas']));
       $pdf = PDF::loadHTML($view)->setPaper('a4');
       return $pdf->stream();

    }    
  }    

    
       

      


    



