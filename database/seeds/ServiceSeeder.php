<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run(): void
    {
        DB::table('service')->insert([
            'id' => 1,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(), 
            'title' => 'Title',
            'message' => "Proper service",
        ]);
    }
}
