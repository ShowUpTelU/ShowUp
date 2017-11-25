@extends('layouts.layout-admin')
@section('content')
<div class="row">
  <div class="col l12">
    <h5>{{$title}}</h5>
    <table class="table bordered">
      <tr>
        <th>No.</th>
        <th>Advertisement</th>
        <th>Instagram</th>
        <th>Price</th>
        <th>{{$action}}</th>
      </tr>
      @foreach ($data as $index => $row)
        <tr>
          <td>{{++$index}}</td>
          <td><a href="{{route('admin.advertisementShow',['advertisement' => $row->Advertisement->id])}}">{{$row->Advertisement->title}}</a></td>
          <td><a href="{{$row->User->Instagram->link}}" target="_blank">{{$row->User->firstName}} {{$row->User->lastName}}</a></td>
          <td>Rp. {{number_format($row->Advertisement->price)}}</td>
          @if ($action)
            <td>
              <form class="" action="{{route('admin.bidPay',['bid' => $row->id])}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" class="btn blue"><i class="material-icons">payment</i></button>
              </form>
            </td>
          @endif
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
