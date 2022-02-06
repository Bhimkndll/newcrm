<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  


 public function run()
    {

        User::create([
            'name'=>'bhim',
            'email'=>'bhi@gmail.com',
            'password'=>bcrypt('bhimkandel'),
            'address'=>'gaindakot',
            'phone'=>'9845036563',
            'role'=>'level3',
            'status'=>1,


        ]);
      
}
}