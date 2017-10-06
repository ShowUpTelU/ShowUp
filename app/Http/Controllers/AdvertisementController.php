<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\AdvertisementPhoto;
use Illuminate\Http\Request;
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
          'photos[]' => 'image'
        ]);
        $ads = Advertisement::create([
          'userId' => Auth::user()->id,
          'title' => $request->title,
          'price' => $request->price,
          'desc' => $request->desc,
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
        return redirect()->route('myAds');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        return view('ads.detail',[
          'data' => $advertisement
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        return view('ads.edit',[
          'data' => $advertisement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
      if ($request->photos) {
        foreach ($request->photos as $photo) {
          $path = $photo->store('ads', 'public');
          AdvertisementPhoto::create([
            'advertisementsId' => $advertisement->id,
            'path' => $path
          ]);
        }
      }
      $advertisement->title = $request->title;
      $advertisement->price = $request->price;
      $advertisement->desc = $request->desc;
      $advertisement->save();
        return redirect()->route('detailAds',['advertisement' => $advertisement->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        if ($advertisement->AdsPhotos) {
          foreach ($advertisement->AdsPhotos as $row) {
            Storage::disk('public')->delete($row->path);
          }
        }
        $advertisement->delete();
        return redirect()->route('myAds');
    }
}
