<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Raig',
            'email' => 'raig.ramzy@gmail.com',
            'password' => '$2y$10$OIIAeDva4HoTLCyZsZwieOo/LfsxqPqAdd1wpzUxP6owryDHZjIt.', // password
        ]);

        Article::factory(10)->create();
        //call categorytableseeder
        $this->call(CategoryTableSeeder::class);
        //call tagtableseeder
        $this->call(TagTableSeeder::class);

        Article::all()->each(function ($article) {
            $article->categories()->sync(Category::all()->random(2));
            $article->tags()->sync(Tag::all()->random(2));
        });

        //I am so smart 😁 take that Stack Exchange


    }
}
