<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {
        $this->call([
            AboutSeeder::class,
            AdminSeed::class,
            MessageSeed::class,
            PageSeeder::class,
            MenuSeeder::class,
        ]);
    }
}
