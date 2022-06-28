<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Film::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(4, true),
            'genre' => $this->faker->randomElement(['action', 'aventure', 'horreur', 'comédie', 'drame', 'thriller', 'science-fiction', 'documentaire']),
            'release_date' => $this->faker->year(),
        ];
    }
}
