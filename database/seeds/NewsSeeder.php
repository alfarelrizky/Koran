<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //faker
        factory('App\news', 20)->create();
        factory('App\media', 5)->create();

        // relasi news tag
        $data_news = collect(['1', '1', '1', '2', '2', '3', '4', '5']);
        $data_tag  = collect(['1','2','3','2','3','1','2','4']);

        for ($i=0; $i < 8; $i++) { 
            \App\news_tag::create([
                'news_id' => $data_news[$i],
                'tag_id' => $data_tag[$i]
            ]);
        }
    }
}
