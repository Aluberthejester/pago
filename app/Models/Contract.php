<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_ci', 'templeado', 'meses', 'salario', 'total',
    ];

    public function post(){
        return $this->belongsTo(Post::class); 
       }
}
