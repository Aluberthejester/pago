<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_ci', 'templeado', 'meses', 'bol1',
        'bol2', 'bol3', 'salario', 'total', 
    ];

    public function employee(){
        return $this->belongsTo(Employee::class); 
   }
}
