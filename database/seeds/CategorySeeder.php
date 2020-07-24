<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = collect(['Islami','Religi','Pemerintah']);
        $data->each(function($sample){
            App\category::create([
                'NamaKategori' => $sample,
            ]);
        });
    }
}
