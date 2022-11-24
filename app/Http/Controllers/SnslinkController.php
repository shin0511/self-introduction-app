<?php

namespace App\Http\Controllers;

use App\Models\Snslink;
use App\Models\Introduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SnslinkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Introduction $introduction){
        
        $snslink = new Snslink();
        $snslink->snsname = $request->input('snsname');
        $snslink->sns_link = $request->input('sns_link');
        $snslink->user_id = Auth::id();
        $snslink->introduction_id = $introduction->id;
        $snslink->save();        
        $snslinks = Snslink::all();

        return redirect()->route('introduction.index', compact('introduction','snslinks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Snslink  $snslink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Introduction $introduction, Snslink $snslink)
    {
        $snslink->sns_link = $request->input('sns_link');
        $snslink->user_id = Auth::id();
        $snslink->introduction_id = $introduction->id;
        $snslink->save();


        return redirect()->route('introduction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snslink  $snslink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Introduction $introduction, Snslink $snslink)
    {
        $snslink->delete();

        return redirect()->route('introduction.index',compact('snslink'));
    }
}
