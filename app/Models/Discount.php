<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'salario_base',
        'desc_salud',
        'desc_jubi',
        'desc_fns',
        'desc_fpc',
        'neto',
        ];
    public function post(){
        return $this->belongsTo(Post::class, 'post_id'); 
       }
}
