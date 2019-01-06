@extends('layouts.setting')
@section('title','User Profile')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <h1 class="heading-h1">{{ Auth::user()->name }}</h1>
    </div>
    <div class="col-md-3">

    </div>
  </div>

  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form class="" action="{{ route('users.update') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" class="form-control" required autocomplete="off" placeholder="Youe Name" value="{{ Auth::user()->name }}">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="text" name="email" class="form-control" required autocomplete="off" placeholder="Youe Email" value="{{ Auth::user()->email }}">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">New Password</label>
          <input type="password" name="password" class="form-control" autocomplete="off" placeholder="New Password">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Confirm New Password</label>
          <input type="password" name="password_confirmation" class="form-control" autocomplete="off" placeholder="Confirm New Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Save Changes</button>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>

</div>
@endsection
