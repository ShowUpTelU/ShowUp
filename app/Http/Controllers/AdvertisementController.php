<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\AdvertisementPhoto;
use Illuminate\Http\Request;
use App\Transaction;
use Storage;
use Auth;
class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ads.myAds',[
          'data' => Advertisement::where('userId',Auth::user()->id)->get()
        ]);
    }

    public function all()
    {
      if (isset(Auth::user()->typeId) == 2) {
        return view('dashboard.advertisementAll',[
          'data' => Advertisement::all()
        ]);
      }else{
        return view('ads.myAds',[
          'data' => Advertisement::all()
        ]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
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
          'title' => 'required|string|max:255',
          'price' => 'required|integer',
          'desc' => 'required',
          'photos[]' => 'image',
          'dueDate' => 'date'
        ]);
        $ads = Advertisement::create([
          'userId' => Auth::user()->id,
          'title' => $request->title,
          'price' => $request->price,
          'desc' => $request->desc,
          'dueDate' => $request->dueDate
        ]);
        if ($request->photos) {
          foreach ($request->photos as $photo) {
            $path = $photo->store('ads', 'public');
            AdvertisementPhoto::create([
              'advertisementsId' => $ads->id,
              'path' => $path
            ]);
          }
        }
        return redirect()->route('ads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $ad)
    {
        if (isset(Auth::user()->typeId) == 2) {
          return view('dashboard.advertisementDetail',[
            'data' => $ad->with('Bids')->find($ad->id),
            'winner' => Transaction::where('advertisementId',$ad->id)->first()
          ]);
        }else{
          return view('ads.detail',[
            'data' => $ad->with('Bids')->find($ad->id),
            'winner' => Transaction::where('advertisementId',$ad->id)->first()
          ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $ad)
    {
        return view('ads.edit',[
          'data' => $ad
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $ad)
    {
      if ($request->photos) {
        foreach ($request->photos as $photo) {
          $path = $photo->store('ads', 'public');
          AdvertisementPhoto::create([
            'advertisementsId' => $ad->id,
            'path' => $path
          ]);
        }
      }
      $ad->title = $request->title;
      $ad->price = $request->price;
      $ad->desc = $request->desc;
      $ad->dueDate = $request->dueDate;
      $ad->save();
        return redirect()->route('ads.show',['advertisement' => $ad->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $ad)
    {
        if ($ad->AdsPhotos) {
          foreach ($ad->AdsPhotos as $row) {
            Storage::disk('public')->delete($row->path);
          }
        }
        $ad->delete();
        return redirect()->route('ads.index');
    }
}
