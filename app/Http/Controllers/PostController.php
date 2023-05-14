<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Introduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Introduction $introduction){
        
        $request->validate([
            'title' => 'required',
            'category' => 'required',
        ]);

        // ディレクトリ名
        $dir = 'works';
        $file=$request->file('works');

        //作品ありの投稿
        if(!empty($file)){
            // アップロードされたファイル名を取得
            $file_name = $request->file('works')->getClientOriginalName();
            // 取得したファイル名で保存
            $request->file('works')->storeAs('public/' . $dir, $file_name);

            //データ作成
            $post = new Post();
            $post->title = $request->input('title');
            $post->caption = $request->input('caption');
            $post->category = $request->input('category');
            $post->workspath = 'storage/' . $dir . '/' . $file_name;
            $post->user_id = Auth::id();
            $post->introduction_id = $introduction->id;
            $post->save();
        }
        //作品無しの投稿
        elseif(empty($file)){
            $post = new Post();
            $post->title = $request->input('title');
            $post->caption = $request->input('caption');
            $post->category = $request->input('category');
            $post->user_id = Auth::id();
            $post->introduction_id = $introduction->id;
            $post->save();
        }

        return redirect()->route('introduction.index', compact('introduction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Snslink  $snslink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Introduction $introduction, Post $post)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $post->title = $request->input('title');
        $post->caption = $request->input('caption');
        $post->user_id = Auth::id();
        $post->introduction_id = $introduction->id;
        $post->save();


        return redirect()->route('introduction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snslink  $snslink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Introduction $introduction, Post $post)
    {

        $file = $request->path;

        $file = str_replace('storage/works/', 'public/works/', $file);
        
        Storage::delete($file);
        
        $post->delete();

        return redirect()->route('introduction.index',compact('post'));
    }
}
