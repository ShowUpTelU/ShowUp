<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Bid;
use App\Advertisement;
use Illuminate\Http\Request;
use Auth;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->typeId == 0) {
        return view('dashboard.bidAll',[
          'data' => Transaction::all()
        ]);
      }
    }

    public function checkout(){
      $transaction = Advertisement::has('Transaction')->where('userId',Auth::user()->id)->get();
      return view('transaction.checkout',[
        'data' => $transaction
      ]);
    }

    public function done(){
      $transaction = Advertisement::has('Transaction.Confirmation')->where('userId',Auth::user()->id)->get();
      return view('transaction.done',[
        'data' => $transaction
      ]);
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
      Transaction::create($request->all());
      return redirect(route('ads.show',['ad'=>$request->advertisementId]));
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
