<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use PDF;

class PDFController extends Controller
{
    public function generate()
    {
        $items = Item::all();       
        $pdf = PDF::loadView('pdf',['items'=>$items]);
        return $pdf->download('orders.pdf');
    }
    
}
