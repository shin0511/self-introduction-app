<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Introduction;


class WebController extends Controller
{
    public function index(Request $request)
    {

        $keyword = $request->input('keyword');

        $query = Introduction::query();

        if(!empty($keyword)) {
            $query->where('nickname', 'LIKE', "%{$keyword}%");
        }

        $introductions = $query->paginate(21);

        return view('web.index', compact('introductions', 'keyword'));
    }
}
