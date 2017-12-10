<?php

namespace App\Http\Controllers;

use App\Bid;
use App\User;
use App\Transaction;
use Auth;
use Storage;
use Session;
use Illuminate\Http\Request;
use Mail;
use App\Mail\BidMail;
class BidController extends Controller
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

    public function waiting()
    {
      return view('bid.index',[
        'title' => 'Bids',
        'bid' => 1,
        'data' => Bid::where([
          ['userId',Auth::id()],
          ['choosen',0]
          ])->get()
      ]);
    }

    public function confirmation()
    {
      return view('bid.index',[
        'title' => 'Bids Confirmation',
        'action' => 'Confirmation',
        'data' => Transaction::has('Bid.User')->where('status',1)->get()
      ]);
    }

    public function ongoing()
    {
      return view('bid.index',[
        'title' => 'Ongoing Bids',
        'data' => Bid::where([
          ['userId',Auth::id()],
          ['choosen',1],
          ['done',0]
          ])->get()
      ]);
    }

    public function done()
    {
      return view('bid.index',[
        'title' => 'Done Bids',
        'bid' => 1,
        'done' => 1,
        'data' => Bid::where([
          ['userId',Auth::id()],
          ['done',1]
          ])->get()
      ]);
    }

    public function setDone(Bid $bid){
      $bid->done = 1;
      $bid->save();
      return redirect(route('bid.done'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bid = Bid::create($request->all());
        Mail::send(new BidMail($bid));
        $request->session()->flash('status', 'Create bid was successful!');
        return redirect(route('advertisement.show',['advertisement' => $request->advertisementId]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update($id, $status)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
