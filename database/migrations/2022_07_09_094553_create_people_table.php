<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('people')) {
            Schema::create('people', function (Blueprint $table) {
                // Person
                $table->string('id')->primary();// OK
                $table->enum('type', ['human', 'werewolf', 'vampire', 'warlock', 'faery', 'demon', 'stray', 'unknown'])->default('unknown');// OK
                $table->string('first_name')->default("");// OK
                $table->string('last_name')->default("");// OK
                $table->string('aliases')->nullable();
                $table->enum('sex', ['male', 'female'])->nullable();// OK
                $table->integer('height')->nullable();
                $table->integer('weight')->nullable();
                $table->boolean('dead')->default(False);// OK
                //$table->integer('criminal_record_id')->nullable();
                //$table->foreign('criminal_record_id')->references('id')->on('criminal_records')->onDelete('set null');

                // Human
                $table->string('birth_date', 11)->nullable();// OK
                $table->string('birth_place')->nullable();
                $table->string('hair')->nullable();
                $table->string('eyes')->nullable();
                $table->enum('ethnic_group', ['white', 'black', 'asian', 'hispanic', 'nativeamerican', 'unknown'])->default('unknown');
                $table->enum('status', ['missing', 'wanted', 'agent', 'civilian', 'prisoner'])->default('civilian');// OK
                $table->string('languages')->nullable();// OK
                $table->string('place_id')->nullable();// OK
                $table->foreign('place_id')->references('id')->on('places')->onDelete('set null');

                // Hidden creatures
                $table->string('group_id')->nullable();// OK
                // FOREIGN: $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
                // Vampires
                $table->string('sire_id')->nullable();// OK
                // FOREIGN: $table->foreign('sire_id')->references('id')->on('people')->onDelete('set null');
                $table->boolean('self_control')->default(False);
                // Warlock
                $table->string('demon_id')->nullable();// OK
                // FOREIGN: $table->foreign('demon_id')->references('id')->on('people')->onDelete('set null');
                // Werewolf
                
                $table->timestamps();
            });

            Schema::table('people', function (Blueprint $table) {
                $table->foreign('sire_id')->references('id')->on('people')->onDelete('set null');
                $table->foreign('demon_id')->references('id')->on('people')->onDelete('set null');
            });
        }
        
        if (Schema::hasTable('places')) {
            Schema::table('places', function (Blueprint $table) {
                $table->foreign('boss_id')->references('id')->on('people')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
