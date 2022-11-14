<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('questions')) { // проверка существования таблицы
            Schema::create('questions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('survey_id'); // принадлежит опросу с ID
                $table->string('question');
                $table->bigInteger('next_question')->nullable(); // следующий вопрос
                $table->timestamps();
                $table->foreign('survey_id')
                    ->references('id')
                    ->on('surveys')
                    ->onUpdate('cascade')
                    ->onDelete('cascade'); // каскадный ключ
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('questions')) { // проверка существования таблицы
            Schema::dropIfExists('questions');
        }
    }
}
