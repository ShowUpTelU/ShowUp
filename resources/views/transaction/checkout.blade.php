@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Checkout</h3>
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
          <th>Price</th>
          <th></th>
        </tr>
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
