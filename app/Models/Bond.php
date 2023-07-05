<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id', 'salario', 'bproduc', 'bvaca',
        'bfin', 'pago', 
    ];

    public function post(){
        return $this->belongsTo(Post::class); 
       }
}
