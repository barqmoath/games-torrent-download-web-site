@extends('layouts.setting')
@section('title','Edit Platform')

@section('content')
<div class="container">
  <h1 class="heading-h1">Edit - {{ $platform->title }}</h1>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
           <h5 class="card-title">{{ $platform->title }}</h5>
           <form class="" action="{{ route('platforms.update',['id' => $platform->id]) }}" method="post">
             {{ csrf_field() }}
             <div class="form-group">
                <label for="exampleInputEmail1">New title :</label>
                <input type="text" name="title" class="form-control" placeholder="{{ $platform->title }}" autofocus>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('settings.platform') }}" class="btn btn-danger">Cancel</a>
           </form>
        </div>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
@endsection
