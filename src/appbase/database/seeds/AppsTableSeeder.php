<?php

use Illuminate\Database\Seeder;

class AppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset table
        DB::table('apps')->delete();

        //dms
        DB::table('apps')->insert([
            //'id' => 1,
            'code' => 'olatt',
            'name' => 'Online Attendece',
            'description' => 'Online Attendece',
        ]);
    }
}
