<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Post;
use PDF;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $employees = Employee::select('employees.nomb', 'employees.apell',
        'employees.temple', 'posts.nombre', 
        'posts.descrip', 'posts.salario', 'posts.horario')
            ->join('posts', 'employees.post_id', '=', 'posts.id')
            ->get();

        $pdf = PDF::loadView('reporte_salarios.index', compact('employees'));
        return $pdf->download('reportes_empleados_cargos.pdf');
    }
}
