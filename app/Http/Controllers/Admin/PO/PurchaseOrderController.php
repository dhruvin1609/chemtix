<?php

namespace App\Http\Controllers\Admin\PO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;

class PurchaseOrderController extends Controller
{
    public function index(){
        // $pdf = PDF::loadView('admin.pdf.p_order');
       
        // return $pdf->download('table.pdf');
        return view('admin.pdf.p_order');
    
     
    }
}
