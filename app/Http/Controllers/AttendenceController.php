<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
class AttendenceController extends Controller
{
    
public function attend(){

$attends=Attendence::with('user')->get();
     return view('admin.attend.attendence')->with(compact('attends'));
}

    }
