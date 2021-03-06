<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeviceTypeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_nilai_perangkat', function (Blueprint $table) {
            $table->integer('device_type_id')->after('id')->nullable()->default(0);
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
            $table->dropColumn('device_type_id');
        });
    }
}
