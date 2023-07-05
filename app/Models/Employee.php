<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'ci';
    protected $fillable = [
        'ci',
        'user_id',
        'nomb',
        'apell',
        'fechanac',
        'tel',
        'temple',
        'post_id',
        'dir',
        'tcontrato',
        ];

    public function users(){
        return $this->belongsTo(User::class); 
    }

    public function bonus(){
        return $this->hasOne(Bonus::class); 
    }

   public function ticket(){
    return $this->hasOne(Ticket::class); 
    }

    public function contract(){
        return $this->hasOne(Contract::class); 
    }

    public function post(){
        return $this->hasOne(Post::class, 'employee_ci', 'ci'); 
    }
}
