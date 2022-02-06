<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskassign extends Model
{
    use HasFactory;

     protected $fillable = [
        'department_id',
        'user_id',
        'client_id',
        'purpose_id',
        'reason',
        
        ];

  public function client(){
      return $this->BelongsTo(Client::class);

    }  

    public function department(){
      return $this->BelongsTo(Department::class);

    }

  public function user(){
      return $this->BelongsTo(User::class);

    }
     public function purpose(){
      return $this->BelongsTo(Purpose::class);

    }

}
