<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_records', function (Blueprint $table) {
            $table->string('person_id')->primary();
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            
            $table->string('crimes');
            $table->boolean('most_wanted')->default(False);
            $table->integer('reward')->nullable();
            $table->text('remarks')->nullable();
            $table->text('caution')->nullable();
            $table->string('danger')->nullable();

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
        Schema::dropIfExists('criminal_records');
    }
}
