<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class MenuFactory extends Factory
{
    protected $model = Menu::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(config('settings.menu')),
            'status' => $this->faker->randomElement(['inactive', 'active']),
            'icon' => 'fa fa-home',
        ];
    }
}
