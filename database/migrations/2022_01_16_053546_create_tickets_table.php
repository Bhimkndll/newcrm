<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
                        $table->id();
                        $table->BigInteger('user_id');
                                                $table->BigInteger('airline_id');

                        $table->string('departure');
                        $table->string('destination');
                        $table->BigInteger('client_id');
                        $table->date('date');
                        $table->time('time');
                        $table->string('description')->nullable();
                        $table->string('pnr');
                        $table->string('ticket_no');
                                                $table->string('remarks')->nullable();





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
        Schema::dropIfExists('tickets');
    }
}
