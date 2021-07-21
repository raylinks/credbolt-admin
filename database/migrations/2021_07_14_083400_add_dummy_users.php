<!-- <?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Migrations\Migration;

class AddDummyUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
            $now = now()->toDateTimeString();
            DB::table('users')->insert([
                ['username' => env('ADMIN_USERNAME', 'admin') , 'name' => 'admin','email' => env('ADMIN_EMAIL', 'admin@gmail.com'), 
                'password' => Hash::make('password'),  'created_at' => $now, 'updated_at' => $now]

            ]);
            // DB::table('user_profiles')->insert([
            //     ['user_id' =>'1', 'role_id' => 1]
            //     ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function () {
            DB::table('users')->where('username', env('ADMIN_USERNAME', 'admin'))->delete();
            DB::table('user_profiles')->where('user_id', 1)->delete();
        });
    }
}   

