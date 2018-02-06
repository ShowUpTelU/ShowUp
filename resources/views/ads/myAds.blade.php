@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Iklan Anda</h3>
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
          <th>Judul</th>
          <th>Harga</th>
          <th>Dibuat pada</th>
          <th>Aksi</th>
        </tr>
        @foreach ($data as $index => $row)
          <tr>
            <td>{{++$index}}</td>
            <td>{{$row->title}}</td>
            <td>Rp. {{number_format($row->price)}}</td>
            <td>{{$row->created_at}}</td>
            <td>
              <a href="{{route('ads.show',['id' => $row->id])}}"><button class="btn blue tooltipped" data-position="right" data-delay="50" data-tooltip="Show Detail"><i class="material-icons">slideshow</i></button><br></a>
            </td>
          </tr>
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
