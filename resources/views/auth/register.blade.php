@extends('layouts.layout')

@section('content')
<div class="container-fluid full-height">
  <div class="row">
    <div class="col l7 hide-on-small-only full-height">
      <img src="{{asset('img/logo-tagline.jpg')}}" class="responsive-img">
    </div>
    <div class="col l5 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Register</h3>
        </div>
      </div>
      <form class="{{ route('register') }}" action="index.html" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s6">
            <input name="firstName" id="first_name" type="text" class="validate" required>
            <label for="first_name">First Name</label>
            @if ($errors->has('firstName'))
                <small class="red-text">{{ $errors->first('firstName') }}</small>
            @endif
          </div>
          <div class="input-field col s6">
            <input name="lastName" id="last_name" type="text" class="validate" required>
            <label for="last_name">Last Name</label>
            @if ($errors->has('lastName'))
                <small class="red-text">{{ $errors->first('lastName') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input name="email" id="email" type="email" class="validate" required>
            <label for="email">Email</label>
            @if ($errors->has('email'))
                <small class="red-text">{{ $errors->first('email') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input name="password" id="password" type="password" class="validate" required maxlength="12">
            <label for="password">Password</label>
            @if ($errors->has('password'))
                <small class="red-text">{{ $errors->first('password') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input name="phone" id="phone" type="tel" class="validate" required>
            <label for="phone">Phone</label>
            @if ($errors->has('phone'))
                <small class="red-text">{{ $errors->first('phone') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea name="address" id="address" class="materialize-textarea" required></textarea>
            <label for="address">Address</label>
            @if ($errors->has('address'))
                <small class="red-text">{{ $errors->first('address') }}</small>
            @endif
          </div>
        </div>
        <div class="file-field input-field">
          <div class="btn amber">
            <i class="tiny material-icons">add_a_photo</i>
            <input type="file">
          </div>
          <div class="file-path-wrapper">
            <input name="photo" class="file-path validate" type="text" placeholder="Photo" required>
          </div>
          @if ($errors->has('photo'))
              <small class="red-text">{{ $errors->first('photo') }}</small>
          @endif
        </div>
        <div class="row center">
          <div class="input-field col s12">
            <button type="submit" class="btn amber" style="width: 100%">Sign Up!</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
