<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WebhookController extends Controller
{
    /**
     * Display the next answer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function input(Request $request)
    {
        $id = (int) $request->id;
        $answer = Answer::where('id', $id)
            ->first();
        if ($answer == null) { // проверка на существование ID ответа в базе
            return response('Некорректное ID ответа !');
        }
        else{
            if ($answer->next_question == null) { // проверка на заполнение ID вопроса у ответа
                $question = Question::where([
                        ['id', $answer->question_id],
                        ['next_question', '<>', null],
                    ])
                    ->first();
                $next_question = Question::where([
                    ['id', $question->next_question],
                ])
                    ->with('survey',
                        'answers')
                    ->first();
                if ($next_question != null) { // проверка на существование ID вопроса в базе
                    return $next_question;
                } else {
                    return response('Вопрос с таким ID ненайден !');
                }
            }
            else{
                $next_question = Question::where('id', $answer->next_question)
                    ->with('survey',
                        'answers')
                    ->first();
                if ($next_question != null) { // проверка на существование ID вопроса в базе
                    return $next_question;
                } else {
                    return response('Вопрос с таким ID ненайден !');
                }
            }
        }
    }
}
