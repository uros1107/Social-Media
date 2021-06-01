<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function order()
    {
        // $tabledata = file_get_contents(base_path('resources/json/table.json'));

        return view('admin.order-list');
    }

    public function order_id()
    {
        // $tabledata = file_get_contents(base_path('resources/json/table.json'));

        return view('admin.order');
    }

    public function idol()
    {
        return view('admin.idol');
    }

    public function add_idol()
    {
        return view('admin.add-idol');
    }

    public function fans()
    {
        return view('admin.fans');
    }
}
