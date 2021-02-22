<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNilaiBacaanLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_nilai_perangkat', function (Blueprint $table) {
            $table->double('nilai_level')->nullable()->after('nilai');
            $table->double('nilai_tma_waduk')->nullable()->after('nilai_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_nilai_perangkat', function (Blueprint $table) {
            $table->dropColumn('nilai_level');
            $table->dropColumn('nilai_tma_waduk');
        });
    }
}
