<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Employee;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function create()
    {
        $datos=DB::table('employees')
                ->select('ci', 'nomb')
                ->get();
            return view('empleados.buscar')->with('datos',$datos);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'ci' => 'required',
        ]); 

        // Realiza la búsqueda del empleado en la tabla employees
    $employees = Employee::where('ci', $$request->ci)->get();

    //if ($empleados->isEmpty()) {
    //    return redirect()->route('buscar')->with('error', 'No se encontró ningún empleado con el CI proporcionado.');
    //}

    // Obtén el valor más reciente de la tabla tickets para cada empleado
        $ticket = Ticket::where('employee_ci', $employees->ci)
            ->orderByDesc('created_at')
            ->first();

        if ($ticket) {
            $employees->mes_año = $ticket->mes_año;
            $employees->salario = $ticket->salario;
            $employees->aguinaldo = $ticket->aguinaldo;
            $employees->desc = $ticket->desc;
            $employees->bonos = $ticket->bonos;
        } else {
            // Si no hay registros en la tabla tickets para el empleado, establecer los valores como nulos
            $employees->mes_año = null;
            $employees->salario = null;
            $employees->aguinaldo = null;
            $employees->desc = null;
            $employees->bonos = null;
        }
        $pdf = PDF::loadView('empleados.index', compact('employees'));
        //$nombreArchivo = 'reporte_empleado_'.$empleado->ci.'.pdf';
        return view('empleados.index', compact('employees'));
        // Descargar el PDF
        //return $pdf->download($nombreArchivo);
    }

    public function show()
    {
        //$discounts = Discount::with('post')->get();

        $pdf = PDF::loadView('empleados.index', compact('empleados'));
        $pdfName = 'reporte_boleta.pdf';

        return $pdf->download($pdfName);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
