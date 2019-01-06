@extends('layouts.setting')
@section('title','Users')

@section('content')

<!-- Add New Model -->
<div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewModalLabel">New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form class="" action="{{ route('users.store') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Username ..." required autofocus autocomplete="off">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email ..." required autofocus autocomplete="off">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password ..." required autofocus autocomplete="off">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password ..." required autofocus autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 120px;">Cancel</button>
          <button type="submit" name="submit" class="btn btn-primary" style="width: 120px;">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-9">
      <h1 class="heading-h1">Users</h1>
    </div>
    <div class="col-md-3">
      <button style="margin-top:20px;" type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#AddNewModal"> <i class="fa fa-plus"></i> Add New User</button>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-center">
              <div class="btn-group btn-group-sm" role="group" aria-label="...">
                <a href="{{ route('users.destroy',['id'=>$user->id]) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-sm btn-secondary" style="width: 120px;">Delete</a>
              </div>
            </td>
          </tr>
          @empty
            <h3>Empty</h3>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
