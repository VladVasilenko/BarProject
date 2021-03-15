<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Seeder;

class MusicSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $musicNames = [

            'Рок','Поп','Джаз','Реп','Электро','Классика'

        ];

       foreach ($musicNames as $musicName){

           Music::query()->create(['name'=>$musicName]);

       }
    }
}
