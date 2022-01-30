<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
     protected $fillable = [
        'department',
       
        
    ];


     public function client(){

      return $this->hasOne(App\Models\Client::class);
    }


     public function  taskassign(){

      return $this->hasOne(Taskassign::class);
    }



}
