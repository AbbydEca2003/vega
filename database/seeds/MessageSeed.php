<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MessageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('message')->insert([
            'created_at' =>	Carbon::now(),
            'updated_at' =>	Carbon::now(),
            'name' => 'Ram',
            'email' => 'admin@admin.com',
            'phone' => '9841123456',
            'message' => 'This is a test message',
        ]);

        DB::table('message')->insert([
            'created_at' =>	Carbon::now(),
            'updated_at' =>	Carbon::now(),
            'name' => 'Ram',
            'email' => 'admin@admin.com',
            'phone' => '9841123456',
            'message' => 'This is a second message',
        ]);
    }
}
