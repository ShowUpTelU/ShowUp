@extends('layouts.dashboard')
@section('content')
<div class="container-fluid full-height">
  <div class="row">
    <div class="col l12">
      <h5>Need Confirmation</h5>
      <table class="bordered">
        <tr>
          <th>No.</th>
          <th>Post</th>
          <th>Instagram</th>
          <th>Photo</th>
          <th>Action</th>
        </tr>
        @foreach ($data as $key => $row)
          <tr>
            <td>{{++$key}}</td>
            <td><a href="{{route('ads.detail',['ad' => $row->Transaction->Ads->id])}}">{{$row->Transaction->Ads->title}}</a></td>
            <td><a href="{{$row->Transaction->Bid->Users->Instagram->link}}" target="_blank">{{$row->Transaction->Bid->Users->Instagram->accountName}}</a></td>
            <td><a href="{{url('storage/'.$row->photo)}}" target="_blank"><i class="material-icons">photo</i></a></td>
            <td>
            @if ($type == 1)
              <a href="{{route('confirmation.updateAdmin',['id' => $row->id])}}"><button class="btn amber">Confirmation</button></a>
            @elseif($type == 4)
              <a href="{{route('confirmation.updateClient',['id' => $row->Transaction->Confirmation->first()->id,'type' => 3])}}">
              <button class="btn red"><i class="material-icons">close</i></button>
              </a>
              <a href="{{route('confirmation.updateClient',['id' => $row->Transaction->Confirmation->first()->id,'type' => 5])}}">
              <button class="btn green"><i class="material-icons">check</i></button>
              </a>
            @endif
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
      $('.materialboxed').materialbox();
    });
  </script>
@endpush
