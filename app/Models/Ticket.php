<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

     protected $fillable = [
        'date','departure','description','destination','client_id','time',
        
    ];


public function client(){

    return $this->BelongsTo(Client::class);
}

   
  public function user(){
      return $this->BelongsTo(User::class);

    }
}





