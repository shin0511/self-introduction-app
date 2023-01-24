<?php

namespace App\Http\Controllers;

use App\Models\Introduction;
use App\Models\Snslink;
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
        $introduction =array();
        $introduction = Auth::user()->introduction;
        $snslinks = Snslink::all();
        
        return view('introduction.index', compact('introduction','snslinks'));
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

        // ディレクトリ名
        $dir = 'image';
        $file=$request->file('icon');

        // sampleディレクトリに画像を保存
        if(!empty($file)){
            // アップロードされたファイル名を取得
            $file_name = $request->file('icon')->getClientOriginalName();
            // 取得したファイル名で保存
            $request->file('icon')->storeAs('public/' . $dir, $file_name);

            $introduction = new Introduction();
            $introduction->nickname = $request->input('nickname');
            $introduction->self_introduction = $request->input('self_introduction');
            $introduction->path = 'storage/' . $dir . '/' . $file_name;
            $introduction->user_id = Auth::id();
            $introduction->save();
        }
        elseif(empty($file)){
        $introduction = new Introduction();
        $introduction->nickname = $request->input('nickname');
        $introduction->self_introduction = $request->input('self_introduction');
        $introduction->user_id = Auth::id();
        $introduction->save();
        }
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
        $snslinks = Snslink::all();

        return view('introduction.show', compact('introduction','snslinks'));

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
        $snslinks = Snslink::all();


        return view('introduction.edit', compact('introduction','snslinks'));
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

        // ディレクトリ名
        $dir = 'image';
        $file=$request->file('icon');

        // sampleディレクトリに画像を保存
        if(isset($file)){
            // アップロードされたファイル名を取得
            $file_name = $request->file('icon')->getClientOriginalName();
            // 取得したファイル名で保存
            $request->file('icon')->storeAs('public/' . $dir, $file_name);

            $introduction->nickname = $request->input('nickname');
            $introduction->self_introduction = $request->input('self_introduction');
            $introduction->path = 'storage/' . $dir . '/' . $file_name;
            $introduction->user_id = Auth::id();
            $introduction->save();
            $snslinks = Snslink::all();
        }
        elseif(empty($file)){
        $introduction->nickname = $request->input('nickname');
        $introduction->self_introduction = $request->input('self_introduction');
        $introduction->user_id = Auth::id();
        $introduction->save();
        $snslinks = Snslink::all();
        }

        return redirect()->route('introduction.index','snslinks');
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
    }
}