@extends('layouts.dashboard')
@section('content')
<div class="container-fluid full-height">
  <div class="row">
    <div class="col l12">
      <h5>All Bidders win</h5>
      <table class="bordered">
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Instagram</th>
          <th>Note</th>
          <th>Price</th>
          <th>Ads</th>
          <th>Action</th>
        </tr>
        @foreach ($data as $key => $row)
          <tr>
            <td>{{++$key}}</td>
            <td><a href="{{route('account.show',['user' => $row->Users->id])}}">{{$row->Users->firstName}} {{$row->Users->lastName}}</a></td>
            <td><a href="{{$row->Users->Instagram->link}}" target="_blank">{{$row->Users->Instagram->accountName}}</a></td>
            <td>{{$row->note}}</td>
            <td>Rp. {{number_format($row->price)}}</td>
            <td></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
