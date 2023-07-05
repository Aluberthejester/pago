<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Post;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::paginate(10);
        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos=DB::table('employees')
            ->select('ci', 'nomb')
            ->get();
        return view('contracts.create')->with('datos',$datos);
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
                // Calcular el total
                $total = $salario_base / $antiguedad;

                // Crear el contrato
        $contract = Contract::create([
            'employee_ci' => $request->employee_ci,
            'templeado' => $request->templeado,
            'meses' => $antiguedad,
            'salario' => $salario_base,
            'total' => $total,
        ]);

        return redirect()->route('contracts.index')->with('success', 'Contrato guardado exitosamente.');
    } else {
        return redirect()->route('contracts.index')->with('error', 'El empleado no cumple con la antigüedad requerida.');
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
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index')
        ->with('success', 'Boleta eliminada exitosamente.');
    }
}
