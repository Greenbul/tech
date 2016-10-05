<?php

return [
    /**
     * Кнопки соцсетей.
     * Используется параметр "slug" для того, чтобы текст на русском или
     * каком-либо языке подтягивать во вьюхе через "trans".
     */


    'socials' => [
        [
            /**
             * Выводить ли элемент на страницу.
             */
            'is_active' => true,
            'slug'      => 'vk',
            'url'       => 'https://vk.com/tehnadzorkiev',
        ],
        [
            'is_active' => true,
            'slug'      => 'fb',
            'url'       => 'https://facebook.com/farpancher',
        ],
        [
            'is_active' => false,
            'slug'      => 'ok',
            'url'       => 'https://ok.ru/id000000',
        ],
        [
            'is_active' => false,
            'slug'      => 'tw',
            'url'       => 'https://twitter.com/id000000',
        ],
    ],
    /**
     * Используемое в полезных ссылках
     * /




    /**
     * Здесь будем хранить параметры кэширования.
     */
    'cache'   => [
        /**
         * Время хранения кэша в минутах для "полной" новости, т.е. при просмотре конкретной.
         */
        'news_full' => 60,

        /**
         * Время кэша для списка новостей на странице.
         */
        'news_list' => 10,
    ],

    /**
     * Это контент полезных ссылок
     */

    'links' => [
        [
            'url' => 'http://www.gitn.org.ua',
            'image' => 'images/link1.jpg',
            'title' => 'Гільдія інженерів технічного нагляду за будівництвом об`єктів архітектури'
        ],
        [
            'url' => 'http://www.dabi.gov.ua',
            'image' => 'images/link2.png',
            'title' => 'Державна архітектурно-будівельна інспекція України'
        ],
        [
            'url' => 'http://www.minregion.gov.ua',
            'image' => 'images/link3.jpg',
            'title' => 'Міністерство регіонального розвитку, будівництва та житлово-комунального господарства України'
        ],
        [
            'url' => 'https://dwg.ru',
            'image' => 'images/link4.jpg',
            'title' => 'Материалы для проектирования'
        ],
        [
            'url' => 'http://dbn.at.ua',
            'image' => 'images/link5.jpg',
            'title' => 'Державні будівельні норми України'
        ],
        [
            'url' => 'http://avk5.forum24.ru',
            'image' => 'images/link6.jpg',
            'title' => 'Обсуждение программного комплекса АВК-5'
        ],
        [
            'url' => 'http://stroysmeta.com.ua',
            'image' => 'images/link7.jpg',
            'title' => 'Помощь в обучении сметному делу. Услуги по составлению и проверке смет'
        ],
        [
            'url' => 'http://svoydom.net.ua',
            'image' => 'images/link8.jpg',
            'title' => 'Строим дом своими руками - полезная информация для вас!'
        ],
        ],
    /**
     * Это контект контактов
     */
    'contacts' => [
        [
            'title' => 'Александр Филькин',
            'url' => '',
            'title1' => '+380683870460',
            'title2' => '+380990040019',
            'image' => 'images/phone.jpg'

        ],
        [
            'title' => '',
            'title1' => '',
            'title2' => '',
            'url' => 'https://vk.com/tehnadzorkiev',
            'image' => 'images/vkon.jpg'

        ],
        [
            'title' => '',
            'title1' => '',
            'title2' => '',
            'url' => 'https://facebook.com/farpancher',
            'image' => 'images/fbook.jpg'

        ],
        [
            'title' => '',
            'title1' => '',
            'title2' => '',
            'url' => 'plyshkamd@mail.ru',
            'image' => 'images/letter.jpg',

        ],
        ],
    /**
     * Здесь будут какие-либо счетчики.
     */
    'count'   => [
        /**
         * Количество выводимых новостей в списке.
         * Рассчитывается количество новостей на 1 странице.
         */
        'news' => 10,
    ],
];