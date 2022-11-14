<p align="center"><h1>Survey</h1></p>
<p align="center"><h2>Laravel 8, PostgreSql</h2></p>
<p align="justify"><strong>Уствновка</strong></p>
<p align="justify">
composer install<br/>
npm install<br/>
npm run prod<br/>
php artisan migrate --seed
</p>
<p align="justify"><strong>Тестирование:</strong></p>
<p align="justify">Отправьте POST-запрос с параметром id текущего ответа на API:<br/>
http://survey.local/api/answer</p>
<p align="justify">В ответ сервер высылает JSON следущего вопроса с ответами:<br>
<pre>
{
    "id": 3,
    "survey_id": 1,
    "question": "Одичаешь, — знаете, будешь все время игры. Выходя с фигуры, он ударял по столу вырывались выражения: «А! была не была, не с тем чувствуя, что держать Ноздрева было бесполезно, выпустил его руки. В.",
    "next_question": 5,
    "created_at": "2022-11-14T09:32:49.000000Z",
    "updated_at": "2022-11-14T09:32:49.000000Z",
    "survey": {
        "id": 1,
        "title": "Тут начал он слегка верхушек какой-нибудь науки.",
        "created_at": "2022-11-14T09:32:49.000000Z",
        "updated_at": "2022-11-14T09:32:49.000000Z"
    },
    "answers": [
        {
            "id": 7,
            "answer": "Нужно желать — побольше таких людей. — Как с того времени много у вас умерло крестьян? — А может.",
            "question_id": 3,
            "next_question": null,
            "created_at": "2022-11-14T09:32:49.000000Z",
            "updated_at": "2022-11-14T09:32:49.000000Z"
        },
        {
            "id": 8,
            "answer": "Вы рассмотрите: вот, например, каретник Михеев! ведь — больше как-нибудь стоят. — Послушайте.",
            "question_id": 3,
            "next_question": null,
            "created_at": "2022-11-14T09:32:49.000000Z",
            "updated_at": "2022-11-14T09:32:49.000000Z"
        },
        {
            "id": 9,
            "answer": "Обед давно уже умерли, остался один неосязаемый чувствами звук. Впрочем, — чтобы нельзя было.",
            "question_id": 3,
            "next_question": null,
            "created_at": "2022-11-14T09:32:49.000000Z",
            "updated_at": "2022-11-14T09:32:49.000000Z"
        }
    ]
}
</pre></p>
<p align="justify"><strong>Задача:</strong></p>
<p align="justify">На свежеустановленном Laravel, на уровне идеи описать примерную архитектуру для вышеописанной логики.</p> 
<p align="justify">Проверяться будет архитектура, паттерны проектирования, стиль кода.</p>
<p align="justify">Работоспособность проверяться не будет.</p>
<p align="justify">Важно правильно понять Тз красным подчеркнуты важные моменты. </p>
<p align="justify"><strong>Логика и термины:</strong></p>
<p align="justify">Survey (hasMany Question)<br/>
Question (belongsTo Survey, hasMany Answer)<br/>
Answer (belongsTo Question)</p>
<p align="justify">Респондент (Respondent) в чате проходит опрос (Survey), отвечая на его вопросы (Question). <strong style="color: red;">Каждый вопрос или ответ</strong> содержит поле <strong style="color: red;">next_question_id</strong> - это id следующего вопроса (<strong style="color: red;">nullable</strong>).</p>
<p align="justify">Каждый ответ респондента (Answer) методом POST приходит на контроллер (WebhookController@input). В теле ответа содержится id ответа (Answer).</p>

