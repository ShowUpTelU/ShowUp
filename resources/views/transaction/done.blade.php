@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Done</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <table>
        <tr>
          <th>No.</th>
          <th>Title</th>
          <th>Instagram</th>
          <th>Price</th>
        </tr>
        @foreach ($data as $key => $row)
          @if ($row->Transaction->Confirmation->first()->type == 5)
            <tr>
              <td>{{++$key}}</td>
              <td><a href="{{route('ads.show',['id' => $row->id])}}">{{$row->title}}</a></td>
              <td><a href="{{$row->Transaction->Bid->Users->Instagram->link}}" target="_blank">{{$row->Transaction->Bid->Users->Instagram->accountName}}</a></td>
              <td>Rp. {{number_format($row->Transaction->Bid->price)}}</td>
            </tr>
          @endif
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
  </script>
@endpush
