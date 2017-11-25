@extends('layouts.layout')
@section('content')
<div class="container">
  @if (session('status'))
    <div class="row">
      <div class="col s12 l12">
        <div class="card green accent-4">
          <div class="card-content white-text">
            <span class="card-title">Message</span>
            <p>{{session('status')}}</p>
          </div>
        </div>
      </div>
    </div>
  @endif
  <div class="row">
    <div class="col l12 s12">
      <h4>{{$title}}</h4>
      <table class="table bordered">
        <tr>
          <th>No.</th>
          <th>Advertisement</th>
          <th>Price</th>
          <th>Due Date</th>
          @if (!isset($bid))
            <th>Set to done</th>
          @elseif (isset($done))
            <th>Status</th>
          @endif
        </tr>
          @foreach ($data as $index => $row)
            <tr>
              <td>{{++$index}}</td>
              <td><a href="{{route('advertisement.show',['advertisement' => $row->Advertisement->id])}}">{{$row->Advertisement->title}}</a></td>
              <td>Rp. {{number_format($row->Advertisement->price)}}</td>
              <td>{{$row->Advertisement->dueDate}} Days</td>
              @if (!isset($bid))
                <td>
                  <form action="{{route('bid.setDone',['bid' => $row->id])}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn blue"><i class="material-icons">check</i></button>
                  </form>
                </td>
              @elseif (isset($done))
                <td>
                  @if ($row->paid == 1)
                    Paid
                  @else
                    Unpaid
                  @endif
                </td>
              @endif
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
    $('.modal').modal();
  });
  </script>
@endpush
