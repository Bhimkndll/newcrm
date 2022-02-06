<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskassignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskassigns', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('department_id');
            $table->BigInteger('user_id');
            $table->BigInteger('client_id');
                        $table->BigInteger('purpose_id');

/*            $table->string('purpose');
*/            $table->string('reason')->nullable();
            $table->string('status')->default("Pending");
                        $table->string('task_reason')->nullable();


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
        Schema::dropIfExists('taskassigns');
    }
}
