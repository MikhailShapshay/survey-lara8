<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('answers')) { // проверка существования таблицы
            Schema::create('answers', function (Blueprint $table) {
                $table->id();
                $table->string('answer');
                $table->unsignedBigInteger('question_id'); // принадлежит вопросу с ID
                $table->bigInteger('next_question')->nullable(); // следующий вопрос
                $table->timestamps();
                $table->foreign('question_id')
                    ->references('id')
                    ->on('questions')
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
        if (Schema::hasTable('answers')) { // проверка существования таблицы
            Schema::dropIfExists('answers');
        }
    }
}
