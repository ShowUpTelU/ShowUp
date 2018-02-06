@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Detail Iklan {{$data->title}}</h3>
        </div>
      </div>
        <div class="row">
          <div class="input-field col s6">
            <input value="{{$data->title}}" name="title" id="title" type="text" disabled>
            <label for="title">Judul</label>
            @if ($errors->has('title'))
                <small class="red-text">{{ $errors->first('title') }}</small>
            @endif
          </div>
          <div class="input-field col s6">
            <input value="{{$data->price}}" name="price" id="price" type="number" disabled>
            <label for="price">Harga</label>
            @if ($errors->has('price'))
                <small class="red-text">{{ $errors->first('price') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input name="dueDate" id="dueDate" type="date" class="datepicker" value="{{$data->dueDate}}" disabled>
            <label for="dueDate">Durasi</label>
            @if ($errors->has('dueDate'))
                <small class="red-text">{{ $errors->first('dueDate') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea name="desc" id="desc" class="materialize-textarea" disabled>{{$data->desc}}</textarea>
            <label for="decs">Deskripsi</label>
            @if ($errors->has('desc'))
                <small class="red-text">{{ $errors->first('desc') }}</small>
            @endif
          </div>
        </div>
        <div class="row">
          @foreach ($data->AdsPhotos as $row)
            <div class="col l3">
              <img src="{{url('storage/'.$row->path)}}" class="responsive-img materialboxed">
              @if (Auth::user()->id == $data->userId)
              <a href="{{route('deletePhotoAds',['advertisementPhoto' => $row->id])}}">
                <button class="btn red full-width tooltipped" data-position="bottom" data-delay="20" data-tooltip="Delete Photo"><i class="material-icons">delete</i></button>
              </a>
              @endif
            </div>
          @endforeach
        </div>
        <div class="row">
          <div class="col l12">
            <h5>Daftar Penawar</h5><hr>
            <table>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Catatan</th>
                <th>Harga</th>
                @if ($data->checkTransaction($data->id) == 0)
                <th>Aksi</th>
                @endif
              </tr>
              @foreach ($data->Bids as $index => $row)
                <tr>
                  <td>{{++$index}}</td>
                  <td><a href="{{$row->Users->Instagram->link}}" target="_blank">{{$row->Users->Instagram->accountName}}</a></td>
                  <td>{{$row->note}}</td>
                  <td>Rp. {{number_format($row->price)}}</td>
                  @if ($data->checkTransaction($data->id) == 0))
                    <td>
                      <a href="{{route('transaction.store',['id'=>$row->id])}}"><button type="button" class="btn green">Choose instagramer</button></a>
                    </td>
                  @endif
                </tr>
              @endforeach
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col l12">
            @if ($winner)
              <h5>Penawar terpilih</h5><hr>
              <table>
                <tr>
                  <th>Nama</th>
                  <th>Catatan</th>
                  <th>Harga</th>
                </tr>
                  <tr>
                    <td><a href="{{$winner->Bid->Users->Instagram->link}}" target="_blank">{{$winner->Bid->Users->Instagram->accountName}}</a></td>
                    <td>{{$winner->Bid->note}}</td>
                    <td>Rp. {{number_format($winner->Bid->price)}}</td>
                  </tr>
              </table>
            @endif
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script type="text/javascript">
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
  $('.datepicker').pickadate({
   selectMonths: true, // Creates a dropdown to control month
   selectYears: 15, // Creates a dropdown of 15 years to control year,
   today: 'Today',
   clear: 'Clear',
   close: 'Ok',
   closeOnSelect: false, // Close upon selecting a date,
   format: 'yyyy-mm-dd'
 });
  </script>
@endpush
