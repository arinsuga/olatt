<?php

use Illuminate\Database\Seeder;

class AppUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset table
        DB::table('app_user')->delete();

        /** user(admin@mail.com) */
        //app(dms)->user(admin@mail.com)
        DB::table('app_user')->insert([
            'app_id' => 1,  //app(dms)
            'user_id' => 1, //user(admin@mail.com)
        ]);

        /** user(staff1@mail.com) */
        //app(dms)->user(staff1@mail.com)
        DB::table('app_user')->insert([
            'app_id' => 1,  //app(dms)
            'user_id' => 2, //user(staff1@mail.com)
        ]);

        /** user(staff2@mail.com) */
        //app(dms)->user(staff2@mail.com)
        DB::table('app_user')->insert([
            'app_id' => 1,  //app(dms)
            'user_id' => 3, //user(staff2@mail.com)
        ]);
    }
}
