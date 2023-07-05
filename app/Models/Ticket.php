<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //'total',
    use HasFactory;
    protected $fillable = [
        'employee_ci', 'mes_año', 'fecha', 'nombre',
        'salario', 'aguinaldo', 'desc', 'bonos', 
    ];

    public function employee(){
        return $this->belongsTo(Employee::class); 
   }

   
}
