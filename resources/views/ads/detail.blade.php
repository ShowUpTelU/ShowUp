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
              <a href="{{route('deletePhotoAds',['advertisementPhoto' => $row->id])}}">
                <button class="btn red full-width tooltipped" data-position="bottom" data-delay="20" data-tooltip="Delete Photo"><i class="material-icons">delete</i></button>
              </a>
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col l12">
            <h5>List of Bidders</h5><hr>
            <table>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Desc</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col l6">
            <button class="btn amber full-width">Edit this post</button>
          </div>
          <div class="col l6">
            <button class="btn red full-width">Delete this post</button>
          </div>
        </div>
        {{-- <div class="row">
          <div class="file-field input-field">
            <div class="btn amber">
              <span>Photos</span>
              <input name="photos[]" type="file" multiple>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Upload one or more photos">
            </div>
            @if ($errors->has('photos'))
                <small class="red-text">{{ $errors->first('photos') }}</small>
            @endif
          </div>
        </div> --}}
        {{-- <div class="row center">
          <div class="input-field col s12">
            <button type="submit" class="btn amber" style="width: 100%">Post!</button>
          </div>
        </div> --}}
    </div>
  </div>
</div>
@endsection
@section('js')
  <script type="text/javascript">
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
  </script>
@endsection
