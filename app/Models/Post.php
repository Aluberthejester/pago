<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descrip',
        'salario',
        'horario',
        ];

    public function employee(){
        return $this->belongsTo(Employee::class); 
    }

    public function discount(){
    return $this->hasOne(Discount::class, 'post_id'); 
    }

    public function bond(){
        return $this->hasOne(Bond::class); 
    }
}
