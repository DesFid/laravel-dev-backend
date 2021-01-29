<?php

namespace Database\Factories\Cecy;

use App\Models\Cecy\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
            'name' => $this->faker->word,
            'cost' => 101,
            'photo' => $this->faker->word,
//            'summary' => $this->faker->word,
            'duration' => $this->faker->word,
            'for_free' => $this->faker->word,
            'observation' => $this->faker->word,
            'objective' => $this->faker->word,
        ];
    }
}
