<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ArticleFactory extends Factory
{

    protected  $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['inactive', 'active']),
            'user_id'=>User::all()->random()->id,
            'menu_id'=>Menu::all()->random()->id,
            'summary' => $this->faker->text,
            'content' => $this->faker->sentences(25, true),
            'featured_image' => "https://picsum.photos/id/".rand(100,1000)."/500/500.jpg",

        ];
    }
}
