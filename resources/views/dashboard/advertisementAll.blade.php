@extends('layouts.dashboard')
@section('content')
<div class="container-fluid full-height">
  <div class="row">
    <div class="col l12">
      <h5>All advertisements</h5>
      <table class="bordered">
        <tr>
          <th>No.</th>
          <th>Title</th>
          <th>Desc</th>
          <th>Price</th>
          <th>Publisher</th>
          <th></th>
        </tr>
        @foreach ($data as $key => $row)
          <tr>
            <td>{{++$key}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->desc}}</td>
            <td>Rp. {{number_format($row->price)}}</td>
            <td><a href="{{route('account.show',['user' => $row->User->id])}}">{{$row->User->firstName}}</a></td>
            <td><a href="{{route('ads.detail',['ad' => $row->id])}}"><button class="btn amber"><i class="material-icons left">details</i> detail</button></a></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
