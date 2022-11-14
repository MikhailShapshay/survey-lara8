<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->unique()->realText($maxNbChars = 200, $indexSize = 2),
            //'next_question' => $this->faker->boolean ? Question::all()->random()->id : null,// случайно для поля следущего вопроса
        ];
    }
}
