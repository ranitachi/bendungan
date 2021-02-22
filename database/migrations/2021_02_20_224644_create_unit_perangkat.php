<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitPerangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_perangkat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perangkat')->nullable();
            $table->integer('perangkat_id')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_perangkat');
    }
}
