@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>{{$title}}</h3>
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
          <th>Action</th>
        </tr>
        @foreach ($data as $key => $row)
          @if ($row->Transaction->Confirmation->first()->type == $type)
            <tr>
              <td>{{++$key}}</td>
              <td><a href="{{route('ads.show',['id' => $row->Transaction->Ads->id])}}">{{$row->Transaction->Ads->title}}</a></td>
              <td><a href="{{$row->Transaction->Bid->Users->Instagram->link}}" target="_blank">{{$row->Transaction->Bid->Users->Instagram->accountName}}</a></td>
              <td>Rp. {{number_format($row->Transaction->Bid->price)}}</td>
              <td>
                @if ($type == 2)
                  <a href="{{route('confirmation.updateClient',['id' => $row->Transaction->Confirmation->first()->id,'type' => 3])}}"><button class="btn amber">Start task</button></a>
                @elseif ($type == 3)
                  <a href="{{route('confirmation.updateClient',['id' => $row->Transaction->Confirmation->first()->id,'type' => 4])}}"><button class="btn amber">Task done</button></a>
                @endif
              </td>
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
