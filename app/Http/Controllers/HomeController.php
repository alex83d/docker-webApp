<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('home', [
            'goods' => Good::query()->orderBy('id', 'DESC')->paginate(6),
        ]);
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $goods = Good::where('title', 'LIKE', "%{$s}%")->orderBy('title')->paginate(4);
        return view('home', compact('goods'));

    }
}
