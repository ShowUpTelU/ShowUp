@extends('layouts.layout-admin')
@section('content')
<div class="row">
  <div class="col l12">
    <h5>{{$title}}</h5>
    <table class="table bordered">
      <tr>
        <th>No.</th>
        <th>Advertisement</th>
        <th>User</th>
        <th>Price</th>
        @if ($confirmation == 1)
          <th>Confirmation</th>
        @endif
      </tr>
      @foreach ($data as $index => $row)
        <tr>
          <td>{{++$index}}</td>
          <td><a href="{{route('admin.advertisementShow',['advertisement' => $row->advertisementId])}}" target="_blank">{{$row->Advertisement->title}}</a></td>
          <td><a href="{{$row->Advertisement->User->Instagram->link}}" target="_blank">{{$row->Advertisement->User->firstName}} {{$row->Advertisement->User->lastName}}</a></td>
          <td>Rp. {{number_format($row->price)}}</td>
          @if ($confirmation == 1)
            <td>
              <form action="{{route('admin.transaction.paid')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="advertisementId" value="{{$row->id}}">
                <button type="submit" class="btn green"><i class="material-icons">payment</i></button>
              </form>
            </td>
          @endif
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
