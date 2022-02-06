<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
                                    $table->BigInteger('user_id');

                        $table->string('fullname');
                        $table->string('address');
                        $table->string('c_email')->nullable();
                        $table->date('c_dob')->nullable();
                        $table->boolean('ticket')->default(0);



/*                        $table->BigInteger('department_id');
*/                        $table->string('phone');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
