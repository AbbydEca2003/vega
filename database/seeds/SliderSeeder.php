<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider')->insert([
            'id' => 1,
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(), 
            'slide_title' => 'Title',
            'slide_sub_title' => 'Sub Title',
            'slide_link' => 'Title',
            'button_title' => 'Title',
            'button_link' => 'Title',
            'is_active' => 1,
        ]);
    }
}
