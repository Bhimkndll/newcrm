<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;

protected $fillable = [
        'user_id','entry_time','entry_counts','break_info','switch'
        
    ];


     public function user(){
      return $this->BelongsTo(User::class);

    }
}
