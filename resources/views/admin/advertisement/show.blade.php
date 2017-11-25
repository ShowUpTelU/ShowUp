@extends('layouts.layout-admin')
@section('content')
<div class="row">
  <div class="col l12">
    <table>
      <tr>
        <td>Title</td>
        <td>{{$data->title}}</td>
      </tr>
      <tr>
        <td>Publisher</td>
        <td>{{$data->User->firstName}}</td>
      </tr>
      <tr>
        <td>Description</td>
        <td>{{$data->desc}}</td>
      </tr>
      <tr>
        <td>Price</td>
        <td>Rp. {{number_format($data->price)}}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td>
          @if ($data->status == 0)
            Ready
          @elseif ($data->status == 1)
            On Going
          @else
            Done
          @endif
        </td>
      </tr>
      <tr>
        <td>Published at</td>
        <td>{{$data->created_at}}</td>
      </tr>
      <tr>
        <td>Due Date</td>
        <td>{{$data->dueDate}}</td>
      </tr>
    </table>
  </div>
</div>
<div class="row">
  @foreach ($data->Photos as $row)
    <div class="col s12 m6 l4">
      <div class="card">
        <div class="card-image">
          <img src="{{url('storage/'.$row->path)}}">
            <a href="{{route('adsPhoto.destroy',['id' => $row->id])}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">delete</i></a>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div class="row">
  <h5>List of bidders</h5>
  <ul class="collection">
      <input type="hidden" name="advertisementId" value="{{$data->id}}">
      @foreach ($data->Bids as $row)
        <li class="collection-item avatar">
          <img src="{{url('storage/'.$row->User->photo)}}" alt="" class="circle">
          <span class="title">{{$row->User->firstName}} {{$row->User->lastName}}</span>
          <p>Instagram : <a href="{{$row->User->Instagram->link}}" target="_blank">{{$row->User->Instagram->link}}</a> </p>
          @if (isset($data->Transaction))
            @if ($row->choosen == 1)
              <td>Choosen</td>
            @else
              <td></td>
            @endif
          @endif
        </li>
      @endforeach
  </ul>
</div>
@endsection
