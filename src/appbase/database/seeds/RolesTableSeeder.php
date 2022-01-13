<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Reset table
        DB::table('roles')->delete();
        //app->dms->1
        $this->call('RolesOlattTableSeeder');
        
    }
}
