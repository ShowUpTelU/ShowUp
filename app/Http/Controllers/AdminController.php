<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Transaction;
use App\Bid;
use Mail;
use App\Mail\TransactionDoneMail;
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

    public function bidOngoing(){
      return view('admin.bid.pay',[
        'title' => 'Bid ongoing',
        'action' => '',
        'data' => Bid::where([
          ['choosen',1],
          ['done',0]
          ])->get()
      ]);
    }

    public function bidDone(){
      return view('admin.bid.pay',[
        'title' => 'Bid done',
        'action' => 'Pay',
        'data' => Bid::where([
          ['choosen',1],
          ['done',1],
          ['paid',0]
          ])->get()
      ]);
    }

    public function bidPaid(){
      return view('admin.bid.pay',[
        'title' => 'Bid done',
        'action' => '',
        'data' => Bid::where([
          ['choosen',1],
          ['done',1],
          ['paid',1]
          ])->get()
      ]);
    }

    public function bidPay(Bid $bid){
      $bid->paid = 1;
      $bid->save();
      return redirect(route('admin.bidPaid'));
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
      $data = $transaction = Transaction::find($request->advertisementId);
      $transaction->paid = 2;
      $transaction->save();
      Mail::send(new TransactionDoneMail($data));
      return redirect(route('admin.transactionPaid'));
    }
}
