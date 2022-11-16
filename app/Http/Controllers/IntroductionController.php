<?php

namespace App\Http\Controllers;

use App\Models\Introduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $introductions = Auth::user()->introduction;

        return view('introduction.index', compact('introductions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $introductions = Auth::user()->introduction;

        return view('introduction.create')
        ->with('user', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nickname' => 'required',
            'self_introduction' => 'required',
        ]);

        $introductions = new Introduction();
        $introductions->nickname = $request->input('nickname');
        $introductions->self_introduction = $request->input('self_introduction');
        $introductions->user_id = Auth::id();
        $introductions->save();

        return redirect()->route('introduction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function show(Introduction $introductions)
    {
        $introductions = Auth::user()->introduction;

        return view('introduction.show', compact('introductions'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Introduction $introductions)
    {
        $introductions = Auth::user()->introduction;

        return view('introduction.edit', compact('introductions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Introduction $introductions)
    {
        $introductions = Auth::user()->introduction;

        $request->validate([
            'nickname' => 'required',
            'self_introduction' => 'required',
        ]);

        $introductions->nickname = $request->input('nickname');
        $introductions->self_introduction = $request->input('self_introduction');
        $introductions->user_id = Auth::id();
        $introductions->save();

        return redirect()->route('introduction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Introduction $introductions)
    {
        $introductions->delete();

        return redirect()->route('introduction.index');
    }
}
