<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crimes', function (Blueprint $table) {
            $table->increments('id', true);

            $table->string('person_id');
            //$table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->string('charge');
            $table->string('city')->nullable();
            $table->string('state_id')->nullable();
            //$table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->string('date')->nullable();
            $table->enum('disposition', ['discharged', 'convicted', 'diversion', 'acquitted', 'no_charges_filed', 'vacated', 'pending', 'suspended'])->nullable();

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
        Schema::dropIfExists('crimes');
    }
}
