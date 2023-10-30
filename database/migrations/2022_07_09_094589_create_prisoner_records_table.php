<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonerRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisoner_records', function (Blueprint $table) {
            $table->string('person_id')->primary();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            
            $table->string('entry_date');
            $table->integer('sentence'); // number of months
            $table->text('psychological_notes')->nullable();
            $table->text('other_notes')->nullable();

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
        Schema::dropIfExists('prisoner_records');
    }
}
