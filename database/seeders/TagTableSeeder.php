<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //create 25 tags with animal names using array
        $tags = [
            [
                'name' => 'Apple',
            ],
            [
                'name' => 'Banana',
            ],
            [
                'name' => 'Orange',
            ],
            [
                'name' => 'Pineapple',
            ],
            [
                'name' => 'Strawberry',
            ],
        ];

        //foreach loop which creates tags into the database
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
