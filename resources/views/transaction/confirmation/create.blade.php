@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col l12 s12">
      <div class="row">
        <div class="col l12 s12 center">
          <h3>Confirmation {{$transactionId->Ads->title}}'s' post</h3>
        </div>
      </div>
        <form action="{{route('confirmation.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="transactionId" value="{{$transactionId->id}}">
          <input type="hidden" name="type" value="1">
          <div class="row">
            <div class="file-field input-field col s12">
              <div class="btn amber">
                <span>Photos</span>
                <input name="photo" type="file" required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload one or more photos">
              </div>
              @if ($errors->has('photos'))
                  <small class="red-text">{{ $errors->first('photos') }}</small>
              @endif
            </div>
          </div>
          <div class="row center">
            <div class="input-field col s12">
              <button type="submit" class="btn amber" style="width: 100%">Send</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script type="text/javascript">
  $(document).ready(function() {
   $('select').material_select();
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
