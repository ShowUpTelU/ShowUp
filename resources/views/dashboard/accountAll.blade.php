@extends('layouts.dashboard')
@section('content')
<div class="container-fluid full-height">
  <div class="row">
    <div class="col l12">
      <h5>Accounts</h5>
      <table class="bordered">
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Instagram</th>
          <th></th>
        </tr>
        @foreach ($data as $key => $row)
          <tr>
            <td>{{++$key}}</td>
            <td>{{$row->firstName}} {{$row->lastName}}</td>
            <td><a href="{{$row->Instagram['link']}}" target="_blank">{{$row->Instagram['accountName']}}</a></td>
            <td><button class="btn amber"><i class="material-icons left">details</i> detail</button></td>
          </tr>
        @endforeach
      </table>
      <ul class="pagination">
       {{ $data->links() }}
     </ul>

    </div>
  </div>
</div>
@endsection
