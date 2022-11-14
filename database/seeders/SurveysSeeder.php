<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveysSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Survey::factory()
            ->has(
                Question::factory()
                    ->has(
                        Answer::factory()
                            ->count(3)
                    )
                    ->count(5)
            )
            ->count(3)
            ->create();

        // случайные переходы
        $questions = Question::all();
        foreach ($questions as $question){
            $number=rand(0,10);
            $next_question_id = ($number % 2 == 0) ? Question::all()->random()->id : null;
            if($next_question_id != null && $next_question_id != $question->id){
                $question->next_question = $next_question_id;
                $question->save();
            }
            else{
                $answer = Answer::where('question_id', $question->id)->inRandomOrder()->first();
                $next_question = Question::where([
                    ['id', '<>', $question->id],
                    ['survey_id', $question->survey_id],
                ])->inRandomOrder()->first();
                $answer->next_question = $next_question->id;
                $answer->save();
            }
        }
    }
}
