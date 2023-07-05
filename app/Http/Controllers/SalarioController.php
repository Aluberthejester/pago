<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Discount;
use App\Models\Post;

class SalarioController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('post')->get();
        
        $pdf = PDF::loadView('descuentos.index', compact('discounts'));
        return view('descuentos.index', compact('discounts'));
        //return $pdf->download('reporte_salarios.pdf');
    }

    public function show()
    {
        $discounts = Discount::with('post')->get();

        $pdf = PDF::loadView('descuentos.index', compact('discounts'));
        $pdfName = 'reporte_salarios_descuentos.pdf';

        return $pdf->download($pdfName);
    }
}
