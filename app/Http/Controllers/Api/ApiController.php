<?php

namespace TECH\Http\Controllers\Api;

use Illuminate\Http\Request;

use TECH\Http\Requests;
use TECH\Http\Controllers\Controller;
use TECH\OrdersConsultant;

class ApiController extends Controller
{
    /**
     * Добавление информации о клиенте в базу.
     *
     * @author  Andrey Helldar <helldar@ai-rus.com>
     * @version 2016-09-13
     * @since   1.0
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function postOrderConsult(Request $request)
    {
        // Обработаем получаемые значения, чтобы нам не подсунули чего...
        $validator = \Validator::make($request->all(), [
            // Поле обязательное, тип - строка, максимум 255 символов.
            'first_name' => 'required|string|max:255',
            // Поле обязательное, тип - цифры
            'phone'      => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => '<ul>' . implode('</li><li>', $validator->errors()->all()) . '</ul>',
            ], 500);
        }

        // Если ошибок нет, выполняем нужные действия.
        // Итак, нам нужно инфу записать в базу.
        OrdersConsultant::create([
            'first_name' => $request->first_name,
            'phone'      => $request->phone,
        ]);

        return response([
            'response' => trans('site.statuses.order_success', [
                'name' => $request->first_name,
            ]),
        ]);
    }
}
