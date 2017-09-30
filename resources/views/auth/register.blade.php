@extends('layouts.layout')

@section('content')
<div class="container-fluid full-height">
  <div class="row">
    <div class="col l7 hide-on-small-only">
      <img src="{{asset('img/logo-tagline.jpg')}}" class="responsive-img">
    </div>
    <div class="col l5 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Register</h3>
        </div>
      </div>
      <form class="{{ route('register') }}" action="index.html" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" required>
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="text" class="validate" required>
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input  id="first_name" type="email" class="validate" required>
            <label for="first_name">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="password" type="password" class="validate" required maxlength="12">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="phone" type="tel" class="validate" required>
            <label for="phone">Phone</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="address" class="materialize-textarea" required></textarea>
            <label for="address">Address</label>
          </div>
        </div>
        <div class="file-field input-field">
          <div class="btn amber">
            <i class="tiny material-icons">add_a_photo</i>
            <input type="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Photo" required>
          </div>
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
