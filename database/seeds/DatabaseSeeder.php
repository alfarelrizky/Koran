<?php

use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->Call(NewsSeeder::class);
        $this->Call(CategorySeeder::class);
        $this->Call(TagSeeder::class);
    }
}
