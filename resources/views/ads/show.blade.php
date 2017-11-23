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
          <td>Price per User</td>
          <td>Rp. {{number_format($data->price)}}</td>
        </tr>
        <tr>
          <td>Status</td>
          <td>
            @if ($data->status == 0)
              Open to bid
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
          <td>{{$data->dueDate}} Days</td>
        </tr>
      </table>
    </div>
    @foreach ($data->Photos as $row)
      <div class="row">
        <div class="col s12 m6 l4">
          <div class="card">
            <div class="card-image">
              <img src="{{url('storage/'.$row->path)}}">
              @if ($data->userId == Auth::id())
                <a href="{{route('adsPhoto.destroy',['id' => $row->id])}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">delete</i></a>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="row">
    <h5>List of bidders</h5>
    <ul class="collection">
      <form action="{{route('transaction.store')}}" method="post">
        {{ csrf_field() }}
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
            @elseif ($data->userId == Auth::id())
                <div class="secondary-content">
                  <input type="checkbox" name="Bids[]" value="{{$row->id}}" class="filled-in" id="filled-in-box-{{$row->id}}" />
                  <label for="filled-in-box-{{$row->id}}">Choose Influencer</label>
                </div>
            @endif
          </li>
        @endforeach
        <button class="btn green">Submit Influencer</button>
      </form>
    </ul>
  </div>
  {{-- START USER ACCESS --}}
  @if ($data->userId == Auth::id())
    <div class="row">
      <div class="col l6">
        <a class="waves-effect waves-light btn amber modal-trigger full-width" href="#edit"><i class="material-icons left">edit</i>Edit</a>
      </div>
      <div class="col l6">
        <form class="" action="{{route('advertisement.destroy',['advertisement' => $data->id])}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn red full-width"><i class="material-icons left">delete</i>Delete</button>
        </form>
      </div>
    </div>
    {{-- END USER ACCESS --}}
    @else
      {{-- START GUEST ACCESS --}}
      <div class="row">
        <div class="col l12 s12">
          @if ($data->checkBid($data->id,Auth::id()) == 0 && !isset($data->Transaction))
            <button data-target="bid" class="btn modal-trigger blue">Click here to bidding!</button>
          @else
            @if (isset($data->Transaction))
              <p>Bid has been closed</p>
            @else
              <p>Youre already set the bid</p>
            @endif
          @endif

        </div>
      </div>

      {{-- START BID MODAL --}}
      <div id="bid" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Start Bidding</h4>
          <form action="{{route('bid.store')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="userId" value="{{Auth::id()}}">
            <input type="hidden" name="advertisementId" value="{{$data->id}}">
            <p>
              Are you sure to take this post?
            </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn blue">Save</button>
        </div>
        </form>
      </div>
      {{-- ENN BID MODAL --}}

      {{-- END GUEST ACCESS --}}
  @endif


</div>
{{-- START EDIT MODAL --}}
<div id="edit" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Edit Advertisement</h4>
      <form action="{{route('advertisement.update',['advertisement' => $data->id])}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="userId" value="{{Auth::id()}}">
        <input type="hidden" name="status" value="{{$data->status}}">
        <div class="input-field col l12 s12">
          <input type="text" name="title" id="title" class="validate" value="{{$data->title}}" required>
          <label for="title">Title</label>
          @if ($errors->has('title'))
              <small class="red-text">{{ $errors->first('title') }}</small>
          @endif
        </div>
        <div class="input-field col l12 s12">
          <textarea name="desc" class="materialize-textarea" id="desc"> {{$data->desc}}</textarea>
          <label for="desc">Description</label>
          @if ($errors->has('desc'))
              <small class="red-text">{{ $errors->first('desc') }}</small>
          @endif
        </div>
        <div class="input-field col l6 s12">
          <input type="number" name="price" id="price" class="validate" value="{{$data->price}}" required>
          <label for="price">Price</label>
          @if ($errors->has('price'))
              <small class="red-text">{{ $errors->first('price') }}</small>
          @endif
        </div>
        <div class="input-field col l6 s12">
          <input type="date" name="dueDate" id="dueDate" value="{{$data->dueDate}}" class="datepicker" required>
          <label for="dueDate">Due Date</label>
          @if ($errors->has('dueDate'))
              <small class="red-text">{{ $errors->first('dueDate') }}</small>
          @endif
        </div>
        <div class="file-field input-field col l12 s12">
          <div class="btn amber">
            <span><i class="material-icons">add_a_photo</i></span>
            <input name="photos[]" type="file" multiple >
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload one or more photos">
          </div>
          @if ($errors->has('photos'))
              <small class="red-text">{{ $errors->first('photos') }}</small>
          @endif
        </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn amber full-width">Save</button>
    </div>
    </form>
  </div>
{{-- END EDIT MODAL --}}
@endsection

@push('js')
  <script type="text/javascript">
  $(document).ready(function(){
    $('.materialboxed').materialbox();
    $('.modal').modal();
  });
  </script>
@endpush
