@extends('layouts.setting')
@section('title','Platforms')

@section('content')

<!-- Add New Model -->
<div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewModalLabel">New Platform</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form class="" action="{{ route('platforms.store') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="New Platform ... " autofocus required autocomplete="off">
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
      <h1 class="heading-h1">Platforms</h1>
    </div>
    <div class="col-md-3">
      <button style="margin-top:20px;" type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#AddNewModal"> <i class="fa fa-plus"></i> Add New Platform</button>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Platform</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($platforms as $platform)
          <tr>
            <th scope="row">{{ $platform->id }}</th>
            <td>{{ $platform->title }}</td>
            <td class="text-center">
              <div class="btn-group btn-group-sm" role="group" aria-label="...">
                <a href="{{ route('platforms.edit',['id' => $platform->id]) }}" class="btn btn-sm btn-secondary" style="width: 120px;">Edit</a>
                <a href="{{ route('platforms.destroy',['id' => $platform->id]) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-sm btn-secondary" style="width: 120px;">Delete</a>
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
