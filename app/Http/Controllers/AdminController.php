<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Transaction;
class AdminController extends Controller
{
    public function advertisement(){
      return view('admin.advertisement.index',[
        'data' => Advertisement::all()
      ]);
    }

    public function advertisementShow(Advertisement $advertisement){
      return view('admin.advertisement.show',[
        'data' => $advertisement
      ]);
    }

    public function bidDone(){
      return view('admin.bid.pay',[
        'title' => 'Bid done',
        'action' => '',
        'data' => Transaction::where('status',4)->get()
      ]);
    }

    public function bidPay(){
      return view('admin.bid.pay',[
        'title' => 'Bid pay',
        'action' => 'Set to paid',
        'data' => Transaction::where('status',3)->get()
      ]);
    }

    public function bidOngoing(){
      return view('admin.bid.pay',[
        'title' => 'Bid ongoing',
        'action' => '',
        'data' => Transaction::where('status',2)->get()
      ]);
    }

    public function transactionUnpaid(){
      return view('admin.transaction.paid',[
        'data' => Transaction::where('paid',0)->get(),
        'title' => "Unpaid Transactions",
        'confirmation' => 0
      ]);
    }

    public function transactionConfirmation(){
      return view('admin.transaction.paid',[
        'data' => Transaction::where('paid',1)->get(),
        'title' => "Confirmation Transactions",
        'confirmation' => 1
      ]);
    }

    public function transactionPaid(){
      return view('admin.transaction.paid',[
        'data' => Transaction::where('paid',2)->get(),
        'title' => "Paid Transactions",
        'confirmation' => 0
      ]);
    }

    public function transactionPaidUpdate(Request $request){
      $transaction = Transaction::find($request->advertisementId);
      $transaction->paid = 2;
      $transaction->save();
      return redirect(route('admin.transactionPaid'));
    }
}
