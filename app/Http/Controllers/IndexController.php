<?php

namespace TECH\Http\Controllers;

use TECH\Http\Requests;
use TECH\News;

class IndexController extends Controller
{
    /**
     * Главная страница.
     *
     * @author  Andrey Helldar <helldar@ai-rus.com>
     * @version 2016-09-12
     * @since   1.0
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('index')->with([
            'topMenu' => $this->getMenu('index'),
        ]);
    }

    /**
     * Для удобства список меню вынес сюда, чтобы вьюхи не загламлять.
     *
     * Метод "trans" - используется для мультиязычных сайтов, но мне просто привычно.
     *
     * Текст перевода здесь:
     *
     * @see     resources/lang/en/site.php
     *
     * @author  Andrey Helldar <helldar@ai-rus.com>
     * @version 2016-09-12
     * @since   1.0
     *
     * @param string $active
     *
     * @return array
     */
    private function getMenu($active = 'index')
    {
        $result = [];

        /**
         * Чтобы не писать портянку из кучи пунктов, используем перебирающий массив.
         * Уточню, что имена роутов и ключ названий менюх должны совпадать.
         * Например:
         *
         * [
         *     'title'     => trans('site.top_menu.index'),
         *     'url'       => route('index'),
         *     'is_active' => $active == 'index',
         * ]
         */
        foreach (trans('site.top_menu') as $key => $value) {
            $result[] = (object)[
                'title'     => $value,
                'url'       => route($key),
                'is_active' => $active == $key,
            ];
        }

        return $result;
    }

    /**
     * Страница полезных ссылок.
     *
     * @author  Andrey Helldar <helldar@ai-rus.com>
     * @version 2016-09-12
     * @since   1.0
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLinks()
    {
        return view('links')->with([
            'topMenu' => $this->getMenu('links'),
        ]);
    }

    /**
     * Страница новостей.
     *
     * @author  Andrey Helldar <helldar@ai-rus.com>
     * @version 2016-09-12
     * @since   1.0
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNews()
    {
        // Если параметр, отвечающий за время кэширования, будет отсутствовать , либо будет нулевым - поставим ему принудительно 10 минут.
        // Минимальное время - 1 минута.
        $news = \Cache::remember('getNews', config('site.cache.news_list', 10), function () {
            // Говорим, чтобы вверху были свежие новости, а внизу - раннее созданные.
            return News::whereIsActive(true)->orderBy('id', 'desc')->paginate(config('site.count.news', 10));
        });

        return view('news')->with([
            'topMenu' => $this->getMenu('news'),
            'news'    => $news,
        ]);
    }

    /**
     * Страница просмотра полной версии новости.
     *
     * @author  Andrey Helldar <helldar@ai-rus.com>
     * @version 2016-09-12
     * @since   1.0
     *
     * @param null $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNewsSlug($slug = null)
    {
        $news = News::whereIsActive(true)->whereSlug($slug)->first();

        if (is_null($news)) {
            return abort(404);
        }

        return view('news-full')->with([
            'topMenu' => $this->getMenu('news'),
            'news'    => $news,
        ]);
    }

    /**
     * Страница с контактами.
     *
     * @author  Andrey Helldar <helldar@ai-rus.com>
     * @version 2016-09-12
     * @since   1.0
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContacts()
    {
        return view('contacts')->with([
            'topMenu' => $this->getMenu('contacts'),
        ]);
    }
}
