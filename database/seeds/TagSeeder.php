<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = collect(['pilkada Solo','Perkembangan Covid-19','Save_george','Aff Indonesia','Shoopee_League','Persija_Juara', 'Indonesia_Juara']);
        $data->each(function($sample){
            \App\tag::create([
                'NamaTag' => $sample,
                ]);
        });
    }
}
