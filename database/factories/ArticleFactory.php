<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //Use fields from create_article_table
            'title' => $this->faker->sentence,
            'user_id' => 1,
            'body' => $this->faker->paragraph,
            'is_published' => 0,
        ];
    }
}
