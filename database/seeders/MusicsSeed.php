<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Seeder;

class MusicsSeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $musicNames = [
            'Рок', 'Поп', 'Джаз', 'Реп', 'Электро', 'Классика'
        ];

        Music::query()->insert(array_map(function (string $music): array {
            return ['name' => $music];
        }, $musicNames));
    }
}
