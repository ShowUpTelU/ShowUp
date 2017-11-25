@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
      <div class="col l12">
        <h4>Transaction</h4>
        <table>
          <tr>
            <th>No.</th>
            <th>Advertisement</th>
            <th>Price</th>
            <th>Days</th>
            @if (isset($paid))
              <th>Confirmation</th>
            @endif
          </tr>
          @foreach ($data as $index => $row)
            <tr>
              <td>{{++$index}}</td>
              <td><a href="{{route('advertisement.show',['advertisement' => $row->id])}}" target="_blank">{{$row->title}}</a></td>
              <td>Rp. {{number_format($row->price)}}</td>
              <td>{{$row->dueDate}} days</td>
              @if (isset($paid))
                <td>
                  <form action="{{route('transaction.update',['transaction' => $row->Transaction->id])}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{$row->id}}">
                    <button type="submit" class="btn green"><i class="material-icons">payment</i></button>
                  </form>
                </td>
              @endif
            </tr>
          @endforeach
        </table>
      </div>
    </div>
</div>
@endsection
