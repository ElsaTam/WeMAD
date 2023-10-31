<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('name');
            $table->string('name_fr')->nullable();
            $table->string('acronym')->nullable();
            $table->integer('danger_level')->nullable();
            $table->integer('security_index')->nullable()->default(null);
            $table->boolean('part_of_ugb')->default(False);
            $table->mediumText('description');

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
        Schema::dropIfExists('organisations');
    }
};
