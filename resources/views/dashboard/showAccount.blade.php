@extends('layouts.dashboard')
@section('content')
<div class="container-fluid full-height">
  <div class="row">
    <div class="col l12">
      <h5>Profile {{$data->firstName}}</h5>
    </div>
  </div>
  <div class="row">
    <div class="col l4 s12">
      <img src="{{url('storage/'.$data->photo)}}" class="responsive-img">
    </div>
    <div class="col l8 s12">
      <table>
        <tr>
          <td><b>Nama Lengkap</b></td>
          <td>{{$data->firstName}} {{$data->lastName}}</td>
        </tr>
        <tr>
          <td><b>Email</b></td>
          <td>{{$data->email}}</td>
        </tr>
        <tr>
          <td><b>Alamat</b></td>
          <td>{{$data->address}}</td>
        </tr>
        <tr>
          <td><b>Telepon</b></td>
          <td>{{$data->phone}}</td>
        </tr>
        <tr>
          <td><b>Instagram</b></td>
          <td><a href="{{$data->Instagram['link']}}" target="_blank">{{$data->Instagram['accountName']}}</a></td>
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection
