<?php

namespace App\Http\Controllers;

use App\TransactionConfirmation;
use App\Transaction;
use App\Bid;
use Illuminate\Http\Request;
use Storage;
use Auth;
class TransactionConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.confirmation',[
          'data' => TransactionConfirmation::where('type',1)->get(),
          'type' => 1
        ]);
    }

    public function showTask()
    {
        return view('dashboard.confirmation',[
          'data' => TransactionConfirmation::where('type',4)->get(),
          'type' => 4
        ]);
    }

    public function showDone()
    {
        return view('dashboard.confirmation',[
          'data' => TransactionConfirmation::where('type',5)->get(),
          'type' => 5
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($confirmation)
    {
        return view('transaction.confirmation.create',[
          'transactionId' => Transaction::find($confirmation)
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
        $path = $request->photo->store('confirmation', 'public');
        TransactionConfirmation::create([
          'transactionId' => $request->transactionId,
          'type' => $request->type,
          'photo' => $path,
        ]);
        return redirect(route('transaction.checkout'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionConfirmation  $transactionConfirmation
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionConfirmation $transactionConfirmation)
    {

    }

    public function showOrder()
    {
      return view('transaction.confirmation.order',[
        'title' => 'My Order',
        'data' => Bid::has('Transaction.Confirmation')->where('userId',Auth::user()->id)->get(),
        'type' => 2
      ]);
    }

    public function showAccClient(){
      return view('transaction.confirmation.order',[
        'title' => 'My Order',
        'data' => Bid::has('Transaction.Confirmation')->where('userId',Auth::user()->id)->get(),
        'type' => 3
      ]);
    }

    public function showDoneClient(){
      return view('transaction.confirmation.order',[
        'title' => 'My Order',
        'data' => Bid::has('Transaction.Confirmation')->where('userId',Auth::user()->id)->get(),
        'type' => 5
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionConfirmation  $transactionConfirmation
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionConfirmation $transactionConfirmation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionConfirmation  $transactionConfirmation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionConfirmation $transactionConfirmation)
    {
        //
    }

    public function updateAdmin($id)
    {
        $tran = TransactionConfirmation::find($id);
        $tran->type = 2;
        $tran->save();
        return redirect(route('confirmation.index'));
    }

    public function updateClient($id,$type)
    {
        $tran = TransactionConfirmation::find($id);
        $tran->type = $type;
        $tran->save();
        return redirect(route('order.myOrder'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionConfirmation  $transactionConfirmation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionConfirmation $transactionConfirmation)
    {
        //
    }
}
