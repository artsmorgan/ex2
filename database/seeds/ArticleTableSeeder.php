<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            DB::table('article')->insert([
                'name' => 'Article_'.$i,
                'description' => str_random(40),
                'price' => 1000+$i,
                'total_in_shelf' => 1+$i,
                'total_in_vault' => 5+$i,
                'store_id' => 1+$i
            ]);
        }
    }
}
