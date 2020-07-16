<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFController extends Controller
{
    public function index()
    {
        $items_data = $this->get_items_data();  
       
        return view('dynamic_pdf')->with('items_data', $items_data);
    }
    public function get_items_data()
    {
        $items_data = DB::table('items')->limit(5)->get();
        return $items_data;

    }
    public function pdf()
    {
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_items_data_to_html());
        $pdf->stream();

    }
    public function convert_items_data_to_html()
    {
        $items_data = $this->get_items_data();
     $output = '
     <h3 align="center">Items List</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="10%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="25%">Item</th>
    <th style="border: 1px solid; padding:12px;" width="25%">Color</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Text Printed</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Date Created</th>
   </tr>
     ';  
     foreach($items_data as $items)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$items->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$items->description.'</td>
       <td style="border: 1px solid; padding:12px;">'.$items->color.'</td>
       <td style="border: 1px solid; padding:12px;">'.$items->print_text.'</td>
       <td style="border: 1px solid; padding:12px;">'.$items->created_at.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    
    
}
