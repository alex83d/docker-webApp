<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontController extends Controller
{

    public function home()
    {
        return (new HomeController)->index();
    }

    public function news()
    {
        return view('news');
    }

    public function about()
    {
        return view('about');
    }

    public function order() {
        return (new OrderController)->current();
    }

}
