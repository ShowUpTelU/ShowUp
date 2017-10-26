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
        </tr>
        @foreach ($data as $key => $row)
          <tr>
            <td>{{++$key}}</td>
            <td><a href="{{route('account.show',['user' => $row->Bid->Users->id])}}">{{$row->Bid->Users->firstName}} {{$row->Bid->Users->lastName}}</a></td>
            <td><a href="{{$row->Bid->Users->Instagram->link}}" target="_blank">{{$row->Bid->Users->Instagram->accountName}}</a></td>
            <td>{{$row->Ads->Bid->note}}</td>
            <td>Rp. {{number_format($row->Ads->Bid->price)}}</td>
            <td><a href="{{route('ads.detail',['ad' => $row->Ads->id])}}">{{$row->Ads->title}}</a></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
