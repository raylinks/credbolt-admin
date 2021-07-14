<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddDescriptionStatusToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->string('description')->default(true)->after('guard_name');
            $table->boolean('is_active')->default(true)->after('description');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('description')->default(true)->after('guard_name');
            $table->boolean('is_active')->default(true)->after('description');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('description');
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('description');
        });
       
    }
}
