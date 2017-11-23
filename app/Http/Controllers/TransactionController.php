<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Bid;
use App\Advertisement;
use Illuminate\Http\Request;
use Session;
class TransactionController extends Controller
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
      $numBids = count($request->Bids);
      foreach ($request->Bids as $bid) {
        $tempBid = Bid::find($bid);
        $tempBid->choosen = 1;
        $tempBid->save();
      }
      $ads = Advertisement::find($request->advertisementId);
      $ads->status = 1;
      $ads->save();
      $transaction = Transaction::create([
        'advertisementId' => $request->advertisementId,
        'price' => $ads->price * $numBids
      ]);
      session()->flash('status', 'Create transaction was successful!');
      return redirect(route('advertisement.show',['advertisement' => $request->advertisementId]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
