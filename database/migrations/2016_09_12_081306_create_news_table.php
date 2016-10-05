<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');

            // Уникальная ссылка для новости. Не будем старомодными, используя ID
            $table->string('slug')->unique();

            // Заголовок новости
            $table->string('title')->unique(); // Говорит, что поле обязано быть уникальным

            // Анонс новости
            $table->text('preview_content')->nullable(); // Параметр говорит, что поле может быть пустым

            // Контент
            $table->text('content')->nullable();

            // Параметр, отвечающий за "активность" новости - вдруг нам не надо ее удалять, а просто временно скрыть?
            $table->boolean('is_active')->default(true);


            $table->timestamps(); // Здесь автоматом пишутся метки создания и изменения новости

            /**
             * В большинстве случаев, для сайтов не нужны другие поля.
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
