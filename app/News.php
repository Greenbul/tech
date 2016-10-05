<?php

namespace TECH;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * Эти поля нужны для реализации "быстрого" добавления данных.
     * Это мягко говоря. Данная фукнция нужна и для каких-то хитрых связей
     *
     * @see https://laravel.com/docs/5.3/eloquent
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'title',
    ];
}
