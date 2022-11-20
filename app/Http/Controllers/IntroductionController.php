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
        $introduction = Auth::user()->introduction;

        return view('introduction.index', compact('introduction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $introduction = Auth::user()->introduction;

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

        $introduction = new Introduction();
        $introduction->nickname = $request->input('nickname');
        $introduction->self_introduction = $request->input('self_introduction');
        $introduction->user_id = Auth::id();
        $introduction->save();

        return redirect()->route('introduction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function show(Introduction $introduction)
    {
        $introduction = Auth::user()->introduction;

        return view('introduction.show', compact('introduction'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Introduction $introduction)
    {
        $introduction = Auth::user()->introduction;

        return view('introduction.edit', compact('introduction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Introduction $introduction)
    {
        $introduction = Auth::user()->introduction;

        $request->validate([
            'nickname' => 'required',
            'self_introduction' => 'required',
        ]);

        $introduction->nickname = $request->input('nickname');
        $introduction->self_introduction = $request->input('self_introduction');
        $introduction->user_id = Auth::id();
        $introduction->save();

        return redirect()->route('introduction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Introduction $introduction)
    {
        $introduction->delete();

        return redirect()->route('introduction.index');
    }
}
