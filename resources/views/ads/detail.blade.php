@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Detail {{$data->title}}'s Post</h3>
        </div>
      </div>
        <div class="row">
          <div class="input-field col s6">
            <input value="{{$data->title}}" name="title" id="title" type="text" disabled>
            <label for="title">Title</label>
            @if ($errors->has('title'))
                <small class="red-text">{{ $errors->first('title') }}</small>
            @endif
          </div>
          <div class="input-field col s6">
            <input value="{{$data->price}}" name="price" id="price" type="number" disabled>
            <label for="price">Price</label>
            @if ($errors->has('price'))
                <small class="red-text">{{ $errors->first('price') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea name="desc" id="desc" class="materialize-textarea" disabled>{{$data->desc}}</textarea>
            <label for="decs">Descriptions</label>
            @if ($errors->has('desc'))
                <small class="red-text">{{ $errors->first('desc') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          @foreach ($data->AdsPhotos as $row)
            <div class="col l3">
              <img src="{{url('storage/'.$row->path)}}" class="responsive-img materialboxed">
              @if (Auth::user()->id == $data->userId)
              <a href="{{route('deletePhotoAds',['advertisementPhoto' => $row->id])}}">
                <button class="btn red full-width tooltipped" data-position="bottom" data-delay="20" data-tooltip="Delete Photo"><i class="material-icons">delete</i></button>
              </a>
              @endif
            </div>
          @endforeach
        </div>
        @if (Auth::user()->id == $data->userId)
        <div class="row">
          <div class="col l12">
            <h5>List of Bidders</h5><hr>
            <table>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Note</th>
                <th>Price</th>
                @if ($data->checkTransaction($data->id) == 0)
                <th>Action</th>
                @endif
              </tr>
              @foreach ($data->Bids as $index => $row)
                <tr>
                  <td>{{++$index}}</td>
                  <td><a href="{{$row->Users->Instagram->link}}" target="_blank">{{$row->Users->Instagram->accountName}}</a></td>
                  <td>{{$row->note}}</td>
                  <td>Rp. {{number_format($row->price)}}</td>
                  @if ($data->checkTransaction($data->id) == 0))
                    <td>
                      <a href="{{route('transaction.store',['id'=>$row->id])}}"><button type="button" class="btn green">Choose instagramer</button></a>
                    </td>
                  @endif
                </tr>
              @endforeach
            </table>
            @if ($winner)
              <h5>The winner of bid</h5><hr>
              <table>
                <tr>
                  <th>Name</th>
                  <th>Note</th>
                  <th>Price</th>
                </tr>
                  <tr>
                    <td><a href="{{$winner->Users->Instagram->link}}" target="_blank">{{$winner->Users->Instagram->accountName}}</a></td>
                    <td>{{$winner->note}}</td>
                    <td>Rp. {{number_format($winner->price)}}</td>
                    <td>
                  </tr>
              </table>
            @endif
          </div>
        </div>
          @if (!$winner)
            <div class="row">
              <div class="col l6 s12">
                <a href="{{route('ads.edit',['advertisement' => $data->id])}}"><button class="btn amber full-width">Edit this post</button></a>
              </div>
              <div class="col l6 s12">
                <form action="{{route('ads.destroy',['advertisement' => $data->id])}}" method="post">
                  <input type="hidden" name="_method" value="DELETE">
                  {{ csrf_field() }}
                  <button type="submit" class="btn red full-width">Delete this post</button>
                </form>
              </div>
            </div>
          @endif
        @else
          @if ($data->checkBid(Auth::user()->id,$data->id) > 0)
            <h5>Youre already set the bid.</h5>
          @else
            {{-- START BID --}}
            <div class="row">
              <div class="col l12 s12">
                <h5>Bid right now!</h5>
                <hr>
                <form class="col l12 s12" action="{{route('bid.store')}}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="advertisementId" value="{{$data->id}}">
                  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                  <div class="row">
                    <div class="input-field col s12">
                      <input name="price" placeholder="Put your new price" id="price" type="number" class="validate">
                      <label for="price">New Price</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <textarea name="note" class="materialize-textarea" placeholder="Type your note to {{$data->User->firstName}}"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <button type="submit" class="btn blue full-width">Go Bid!</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            {{-- END BID --}}
          @endif
        @endif
    </div>
  </div>
</div>
@endsection
@push('js')
  <script type="text/javascript">
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
  </script>
@endpush
