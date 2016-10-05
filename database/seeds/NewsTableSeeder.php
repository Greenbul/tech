<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Чтобы нам вручную не заливать тестовые новости для проверки, воспользуемся
        // пакетом "из коробки" - фейкером.
        $faker = Faker\Factory::create();

        // Добавим 500 новостей :)
        $news_count = 500;

        // Так как мы можем много раз запускать сиды, лучше вначале очистить таблицу.
        \TECH\News::truncate();

        // Добавим
        for ($i = 0; $i < $news_count; $i++) {
            // Укажем генерацию уникального текста длиной не более 100 символов.
            $title = $faker->unique()->text(100);

            // Это текстовый идентификатор, который будет иметь вид "eto-moy-sait" для заголовка "Это мой сайт!".
            // Отображается в URL.
            $slug = str_slug($title);

            // Пусть превью текста будет у нас 512 символов длиной.
            $preview_content = $faker->realText(512);

            // 20 параграфов добавим. Будем отрабатывать обработку HTML-тегов на выходе.
            $content_array = $faker->paragraphs(20);
            $content       = '<p>' . implode('</p><p>', $content_array) . '</p>';

            // И, наконец, добавляем в базу.
            $news = \TECH\News::firstOrNew([
                'slug'  => $slug,
                'title' => $title,
            ]);

            $news->preview_content = $preview_content;
            $news->content         = $content;
            $news->save();
        }
    }
}
