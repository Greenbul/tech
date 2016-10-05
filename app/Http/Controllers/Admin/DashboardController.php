<?php

namespace TECH\Http\Controllers\Admin;

use Illuminate\Http\Request;

use TECH\Http\Requests;
use TECH\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Главная страница админки.
     *
     * @author  Andrey Helldar <helldar@ai-rus.com>
     * @version 2016-09-13
     * @since   1.0
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getDashboard()
    {
        return view('admin.dashboard');
    }
}
