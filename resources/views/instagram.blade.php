@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Your Instagram</h3>
        </div>
      </div>
      @if ($data)
        <form action="{{route('updateInstagram',['instagram' => $data->id])}}" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s6">
              <input value="{{$data->accountName}}" name="account" id="account" type="text">
              <label for="account">Account Name</label>
              @if ($errors->has('account'))
                  <small class="red-text">{{ $errors->first('account') }}</small>
              @endif
            </div>
            <div class="input-field col s6">
              <input value="{{$data->link}}" name="link" id="link" type="text" required>
              <label for="link">Link</label>
              @if ($errors->has('link'))
                  <small class="red-text">{{ $errors->first('link') }}</small>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input value="{{$data->followers}}" name="followers" id="followers" type="text" class="validate" required>
              <label for="followers">Followers</label>
              @if ($errors->has('followers'))
                  <small class="red-text">{{ $errors->first('followers') }}</small>
              @endif
            </div>
            <div class="input-field col s6">
              <select name="active" id="active">
                <option value="0" @if ($data->active == 0) selected @endif>No</option>
                <option value="1" @if ($data->active == 1) selected @endif>Yes</option>
              </select>
              <label for="active">Active</label>
            </div>
            </div>
          </div>
          <div class="row center">
            <div class="input-field col s12">
              <button type="submit" class="btn amber" style="width: 100%">Update</button>
            </div>
          </div>
        </form>
      @else
        <form action="{{route('addInstagram')}}" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s6">
              <input value="" name="account" id="account" type="text" required>
              <label for="account">Account Name</label>
              @if ($errors->has('account'))
                  <small class="red-text">{{ $errors->first('account') }}</small>
              @endif
            </div>
            <div class="input-field col s6">
              <input value="" name="link" id="link" type="text" required>
              <label for="link">Link</label>
              @if ($errors->has('link'))
                  <small class="red-text">{{ $errors->first('link') }}</small>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input value="" name="followers" id="followers" type="number" required>
              <label for="followers">Followers</label>
              @if ($errors->has('followers'))
                  <small class="red-text">{{ $errors->first('followers') }}</small>
              @endif
            </div>
            <div class="input-field col s6">
              <select name="active" id="active">
                <option value="0" selected>No</option>
                <option value="1">Yes</option>
              </select>
              <label for="active">Active</label>
            </div>
          </div>
          <div class="row center">
            <div class="input-field col s12">
              <button type="submit" class="btn amber" style="width: 100%">Update</button>
            </div>
          </div>
        </form>
      @endif
    </div>
  </div>
</div>
@endsection
@section('js')
  <script type="text/javascript">
  $(document).ready(function() {
   $('select').material_select();
  });
  </script>
@endsection
