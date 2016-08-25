<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 0; $i < 5; $i++){
            DB::table('store')->insert([
                'name' => 'store_'.$i,
                'address' => str_random(40),
            ]);
        }

    }
}
