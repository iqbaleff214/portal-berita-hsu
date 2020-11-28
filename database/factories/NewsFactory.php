<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5, true),
            'image' => 'default.png',
            'content' => $this->faker->text(800),
            'created_at' => $this->faker->dateTime(),
            'user_id' => rand(1, 3),
            'category_id' => rand(1, 3),
        ];
    }
}
