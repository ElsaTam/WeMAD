<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('groups')) {
            Schema::create('groups', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string('group_type_id');
                $table->foreign('group_type_id')->references('id')->on('group_types')->onDelete('cascade');
                $table->string('name');
                $table->string('leader_id')->nullable();
                $table->foreign('leader_id')->references('id')->on('people')->onDelete('set null');
                $table->string('office_id')->default('office_washington_dc');
                $table->foreign('office_id')->references('id')->on('places')->onDelete('restrict');
                $table->timestamps();
            });
        }

        Schema::table('people', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
