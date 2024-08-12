<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'id' => 1,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(), 
            'menu_name' => 'Title',
            'link' => "www.google.com",
            'is_active' => 1,
        ]);
    }
}
