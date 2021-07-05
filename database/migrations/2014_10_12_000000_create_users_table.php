<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->rememberToken();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
        $this->seed();
    }

    private function seed()
    {
        DB::transaction(function () {
            $now = now()->toDateTimeString();

            // Create User
            DB::table('users')->insert([
                'username' => env('ADMIN_USERNAME', 'admin'),
                'email' => env('ADMIN_EMAIL', 'admin@gmail.com'),
                'password' => Hash::make('password'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
