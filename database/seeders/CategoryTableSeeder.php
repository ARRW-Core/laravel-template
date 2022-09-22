<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 25 categories
        $categories = [
            [
                'name' => 'Laravel',
            ],
            [
                'name' => 'Vue',
            ],
            [
                'name' => 'React',
            ],
            [
                'name' => 'PHP',
            ],
            [
                'name' => 'JavaScript',
            ],
            [
                'name' => 'Python',
            ],
            [
                'name' => 'Django',
            ],
            [
                'name' => 'Flask',
            ],
            [
                'name' => 'Ruby',
            ],
            [
                'name' => 'Rust',
            ]
        ];
        //foreach loop which creates categories into the database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
