<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        DB::table('about_us')->insert([
            'Company_name' => 'Vega Sourcing Company',
            'email' => 'vega@vega.com',
            'address' => 'Lalitpur',
            'phone' => '9012345678',
            'twitter' => 'twit',
            'facebook' => 'fb',
            'linkedin' => 'link',
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
