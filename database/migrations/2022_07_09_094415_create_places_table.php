<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            // Place
            $table->string('id')->primary();
            $table->enum('type', ['office', 'prison']);
            $table->string('name');
            $table->string('boss_id')->nullable();
            $table->string('state_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->timestamps();

            // Office

            // Prison
            $table->integer('security_level')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
