<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Bonus;
use App\Models\Employee;
use App\Models\Post;
use App\Models\Ticket;
use Carbon\Carbon;

use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bonuses = Bonus::paginate(10);
        return view('bonuses.index', compact('bonuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos=DB::table('employees')
            ->select('ci', 'nomb')
            ->get();
        return view('bonuses.create')->with('datos',$datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_ci' => 'required|max:100',
            'templeado' => 'required|max:100',
            ]);

            // Obtener el empleado y su antigüedad
            $employee = Employee::where('ci', $request->input('employee_ci'))->first();
            $post = Post::where('id', $employee->post_id)->first();
            $antiguedad = $employee->created_at->diffInMonths();

            // Obtener el salario base
            $salario_base = $post->salario;

            if ($antiguedad >= 3) {
                // Obtener los últimos 3 valores de la tabla tickets para el empleado
                $ultimos_tickets = Ticket::where('employee_ci', $request->input('employee_ci'))
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->pluck('nombre');

                // Calcular el promedio de los últimos 3 valores de tickets
                $promedio = $ultimos_tickets->avg();

                // Calcular el salario total
                $salario_total = $promedio / 3;

                // Crear el registro en la tabla bonuses
                $bonus = Bonus::create([
                    'employee_ci' => $request->employee_ci,
                    'templeado' => $request->templeado,
                    'salario' => $salario_base,
                    'meses' => $antiguedad,
                    'bol1' => $ultimos_tickets[0],
                    'bol2' => $ultimos_tickets[1],
                    'bol3' => $ultimos_tickets[2],
                    'total' => $salario_total,
                ]);

        return redirect()->route('bonuses.index')->with('success', 'Contrato guardado exitosamente.');
    } else {
        return redirect()->route('bonuses.index')->with('error', 'El empleado no cumple con la antigüedad requerida.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Bonus $bonus)
    {
        $bonus->delete();
        return redirect()->route('bonuses.index')
        ->with('success', 'Boleta eliminada exitosamente.');
    }
}
