<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Employee;
use App\Models\Post;
use App\Models\Discount;
use App\Models\Bond;
use App\Models\Contract;
use App\Models\Bonus;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::paginate(10);
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos=DB::table('employees')
            ->select('ci', 'nomb')
            ->get();
        return view('tickets.create')->with('datos',$datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_ci' => 'required',
            'mes_año' => 'required',
            'fecha' => 'required',
            'nombre' => 'required',
        ]);

        // Obtener el empleado y su antigüedad
        $employee = Employee::where('ci', $request->input('employee_ci'))->first();
        $post = Post::where('id', $employee->post_id)->first();
        $discount = Discount::where('post_id', $post->id)->first();
        $employee->temple;

        // Obtener el mes actual
        $mesActual = Carbon::now()->month;

        if ( $employee->temple == 'planta'){
            //$empleado = Bonus::where('id', $request->input('employee_ci'))->first();
            $bond = Bond::where('post_id', $employee->post_id)->first();
            $pago = $bond->pago;
            
            if ($mesActual === 12) {
                // Obtener el total de la tabla bonuses
                $employee_ci = $request->employee_ci;
                $bonus = Bonus::where('employee_ci', $employee_ci)->first();
        
                if ($bonus) {
                    $n2 = $bonus->total;
                } else {
                    $n2 = 0;
                }
            } else {
                $n2 = 0;
            }
        }
        else{
            //$empleado = Contract::where('id', $request->input('employee_ci'))->first();
            $pago = 0;

            if ($mesActual === 12) {
                // Obtener el total de la tabla bonuses
                $employee_ci = $request->employee_ci;
                $bonus = Contract::where('employee_ci', $employee_ci)->first();
        
                if ($bonus) {
                    $n2 = $bonus->total;
                } else {
                    $n2 = 0;
                }
            } else {
                $n2 = 0;
            }
        }
        // Obtener el salario base
        $salario_base = $post->salario;

        $n1 = $post->salario;
        $n3 = $discount->neto;
        $n4 = $pago;
        $nombre = $n1 + $n2 + $n4 - $n3;
        $ticket = Ticket::create([
            'employee_ci' => $request->employee_ci,
            'mes_año' => $request->mes_año,
            'fecha' => $request->fecha,
            'nombre' => $nombre,
            'salario' => $n1,
            'aguinaldo' => $n2,
            'desc' => $n3,
            'bonos' => $n4,
            ]);
            $ticket->save();
            return redirect()->route('tickets.index');
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
    public function edit(Ticket $ticket)
    {
        $datos=DB::table('employees')
            ->select('ci', 'nomb')
            ->get();
        return view('tickets.create')->with('datos',$datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'employee_ci' => 'required',
            'mes_año' => 'required',
            'fecha' => 'required',
            'nombre' => 'required',
            'salario' => 'required',
            'aguinaldo' => 'required',
            'desc' => 'required',
            'bonos' => 'required',
            ]);
            $n1 = intval($request->salario);
        $n2 = intval($request->aguinaldo);
        $n3 = intval($request->desc);
        $n4 = intval($request->bonos);
        $nombre = $n1 + $n2 + $n4 - $n3;
            $ticket = fill([
                'employee_ci' => $request->employee_ci,
                'mes_año' => $request->mes_año,
                'fecha' => $request->fecha,
                'nombre' => $nombre,
                'salario' => $request->salario,
                'final' => $request->final,
                'aguinaldo' => $request->aguinaldo,
                'desc' => $request->desc,
                'bonos' => $request->bonos,
            ]);
            $ticket->save();
            return redirect()->route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')
        ->with('success', 'Boleta eliminada exitosamente.');
    }
}
