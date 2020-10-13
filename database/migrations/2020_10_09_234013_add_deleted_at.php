<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_types', function (Blueprint $table) {
            $table->timestamp('deleted_at')->after('updated_at')->nullable();
        });
        Schema::table('administrator_systems', function (Blueprint $table) {
            $table->timestamp('deleted_at')->after('updated_at')->nullable();
        });
        Schema::table('email_receivers', function (Blueprint $table) {
            $table->timestamp('deleted_at')->after('updated_at')->nullable();
        });
        Schema::table('privileges', function (Blueprint $table) {
            $table->timestamp('deleted_at')->after('updated_at')->nullable();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->timestamp('deleted_at')->after('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_types', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('administrator_systems', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('email_receivers', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('privileges', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
