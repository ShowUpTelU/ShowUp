@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Post Your Ads</h3>
        </div>
      </div>
        <form action="{{route('ads.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s6">
              <input name="title" id="title" type="text" required>
              <label for="title">Title</label>
              @if ($errors->has('title'))
                  <small class="red-text">{{ $errors->first('title') }}</small>
              @endif
            </div>
            <div class="input-field col s6">
              <input name="price" id="price" type="number" required>
              <label for="price">Price</label>
              @if ($errors->has('price'))
                  <small class="red-text">{{ $errors->first('price') }}</small>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea name="desc" id="desc" class="materialize-textarea" required></textarea>
              <label for="decs">Descriptions</label>
              @if ($errors->has('desc'))
                  <small class="red-text">{{ $errors->first('desc') }}</small>
              @endif
            </div>
          </div>
          <div class="row">
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
          </div>
          <div class="row center">
            <div class="input-field col s12">
              <button type="submit" class="btn amber" style="width: 100%">Post!</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script type="text/javascript">
  $(document).ready(function() {
   $('select').material_select();
  });
  </script>
@endpush
