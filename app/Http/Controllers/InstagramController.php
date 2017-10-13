<?php

namespace App\Http\Controllers;

use App\Instagram;
use Illuminate\Http\Request;
use Auth;
class InstagramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instagram.create',[
          'data' => Instagram::where('userId',Auth::user()->id)->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Instagram::create([
          'userId' => Auth::user()->id,
          'accountName' => $request->account,
          'followers' => $request->followers,
          'link' => $request->link,
          'active' => $request->active,
        ]);
        return redirect()->route('instagram.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instagram  $instagram
     * @return \Illuminate\Http\Response
     */
    public function show(Instagram $instagram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instagram  $instagram
     * @return \Illuminate\Http\Response
     */
    public function edit(Instagram $instagram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instagram  $instagram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instagram $instagram)
    {
        Instagram::find($instagram->id)->update([
          'accountName' => $request->account,
          'followers' => $request->followers,
          'link' => $request->link,
          'active' => $request->active,
        ]);
        return redirect()->route('instagram.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instagram  $instagram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instagram $instagram)
    {
        //
    }
}
