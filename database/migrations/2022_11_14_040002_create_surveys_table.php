<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('surveys')) { // проверка существования таблицы
            Schema::create('surveys', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->timestamps();
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
        if (Schema::hasTable('surveys')) { // проверка существования таблицы
            Schema::dropIfExists('surveys');
        }
    }
}
