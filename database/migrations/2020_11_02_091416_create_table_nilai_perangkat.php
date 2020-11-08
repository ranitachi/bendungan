<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNilaiPerangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_nilai_perangkat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perangkat')->nullable();
            $table->integer('perangkat_id')->nullable()->default(0);
            $table->string('tanggal_excel')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('nilai')->nullable()->default(0);
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
        Schema::dropIfExists('table_nilai_perangkat');
    }
}
