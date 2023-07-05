<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Bond;
use App\Models\Employee;
use App\Models\Post;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos=DB::table('users')
            ->select('id', 'name')
            ->get();
        $dates=DB::table('posts')
            ->select('id', 'nombre')
            ->get();
        return view('employees.create')->with('datos',$datos)->with('dates',$dates);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required',
            'user_id' => 'required|max:100',
            'nomb' => 'required|max:100',
            'apell' => 'required',
            'fechanac' => 'required',
            'tel' => 'required',
            'temple' => 'required',
            'post_id' => 'required',
            'dir' => 'required',
            'tcontrato' => 'nullable|max:30',
            ]);
            
            // Recupera el salario correspondiente a la id introducida
            //$salario = Post::findOrFail($request->post_id);
            //$salario_base = $salario->salario_base;
            //$saldo->salario;
            //Proc para crear una nueva fila en la tabla descuentos, cuando se crea un nuevo empleado
            $salario=Post::findOrFail($request->post_id);
            $salario_base = intval($salario->salario);
            $desc_salud = $salario_base * 0.03;
            $desc_jubi = $salario_base * 0.1;
            $desc_fns = $salario_base * 0.01;
            $desc_fpc = $salario_base * 0.015;
            $neto = $desc_salud
            + $desc_jubi
            + $desc_fns
            + $desc_fpc;

            //Proc para crear una nueva fila en la tabla bonos, cuando se crea un nuevo empleado
            $empleado = $request->temple;

            if ($empleado == 'planta') {
                // Cálculo de bonos para empleados de planta
                $salario_base = intval($salario->salario);
                $bproduc = $salario_base * 0.13;
                $bvaca = $salario_base * 0.33;
                $bfin = $salario_base * 0.05;
                $pago = $bproduc 
                + $bvaca
                + $bfin;

                $bond = Bond::create([
                    'post_id' => $request->post_id,
                    'salario' => $salario_base,
                    'bproduc' => $bproduc,
                    'bvaca' => $bvaca,
                    'bfin' => $bfin,
                    'pago' => $pago,
                    ]);
                    $bond->save();
            } else {

            }

            $employee = Employee::create([
            'ci' => $request->ci,
            'user_id' => $request->user_id,
            'nomb' => $request->nomb,
            'apell' => $request->apell,
            'fechanac' => $request->fechanac,
            'tel' => $request->tel,
            'temple' => $request->temple,
            'post_id' => $request->post_id,
            'dir' => $request->dir,
            'tcontrato' => $request->tcontrato,
            ]);
            $employee->save();

            $discount = Discount::create([
                'post_id' => $request->post_id,
                'salario_base' => $salario_base,
                'desc_salud' => $desc_salud,
                'desc_jubi' => $desc_jubi,
                'desc_fns' => $desc_fns,
                'desc_fpc' => $desc_fpc,
                'neto' => $neto,
                ]);
                $discount->save();
            return redirect()->route('employees.index');
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
    public function edit(Employee $employee)
    {
        //
        $datos=DB::table('users')
            ->select('id', 'name')
            ->get();
        return view('employees.edit', compact('employee'))->with('datos',$datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $request->validate([
            'user_id' => 'required|max:100',
            'nomb' => 'required|max:100',
            'apell' => 'required',
            'fechanac' => 'required',
            'tel' => 'required',
            'temple' => 'required',
            'post_id' => 'required',
            'dir' => 'required',
            'tcontrato' => 'nullable|max:30',
            ]);
            $employee->fill([
                'user_id' => $request->user_id,
                'nomb' => $request->nomb,
                'apell' => $request->apell,
                'fechanac' => $request->fechanac,
                'tel' => $request->tel,
                'temple' => $request->temple,
                'post_id' => $request->post_id,
                'dir' => $request->dir,
                'tcontrato' => $request->tcontrato,
            ]);
            $employee->save();
            return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
