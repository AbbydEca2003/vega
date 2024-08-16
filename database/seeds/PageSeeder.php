<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page')->insert([
            'id' => 1,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(), 
            'title' => 'Title',
            'status' => "active",
            'status' => "<h1>Hello</h1>",

        ]);
    }
}

