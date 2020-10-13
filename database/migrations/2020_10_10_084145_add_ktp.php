<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ktp')->nullable()->after('status');
            $table->string('no_handphone')->nullable()->after('ktp');
            $table->string('no_telepon')->nullable()->after('no_handphone');
            $table->string('alamat')->nullable()->after('no_telepon');
            $table->string('gender')->nullable()->after('alamat');
            $table->string('foto')->nullable()->after('gender');
            $table->integer('level')->nullable()->default(0)->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ktp');
            $table->dropColumn('no_handphone');
            $table->dropColumn('no_telepon');
            $table->dropColumn('alamat');
            $table->dropColumn('gender');
            $table->dropColumn('foto');
            $table->dropColumn('level');
        });
    }
}
