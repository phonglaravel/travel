<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $content->header('Admin');
        $content->description('Quản lý travel');
        // $content->row(function(Row $row) {
        //     $row->column(6, '');
        //     $row->column(6, '   ');
        // });
        return $content;
    }
}
