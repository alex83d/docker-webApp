<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;
/*
 * Class GoodController
 * **/

class GoodController extends Controller
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

    public function good(int $id)
    {
        /** @var Good $good */
        $good = Good::with('category')->findOrFail($id);
        return view('good', compact('good'));
    }

    public function category(int $id)
    {
        /** @var Category $category */
        $goods = Good::query()->where('category_id', '=', $id)->paginate(6);
        return view('home', [
            'goods' => $goods,
            'categories' => Category::all(),
            'currentCategory' => Category::findOrFail($id)
        ]);
    }
}
