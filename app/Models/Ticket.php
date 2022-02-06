<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

     protected $fillable = ['user_id',
        'date','departure','description','destination','client_id','time','type','airline_id','pnr','ticket_no','remarks'
        
    ];


public function client(){

    return $this->BelongsTo(Client::class);
}

   
  public function user(){
      return $this->BelongsTo(User::class);

    }

    public function airline(){
      return $this->BelongsTo(Airline::class);

    }

}





