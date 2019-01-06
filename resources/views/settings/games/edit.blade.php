@extends('layouts.setting')
@section('title','Games Edit')

@section('content')
  <div class="container">
    <h1 class="heading-h1">Edit Game</h1>

    <form class="" action="{{ route('games.update',['id' => $game->id]) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label>Game Platform</label>
            <select name="platform_id" class="form-control">
              <option value="{{ $game->platform_id }}">Stay Old Platform</option>
              @foreach($platforms as $p)
                <option value="{{ $p->id }}">{{ $p->title }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Game Category</label>
            <select name="cat_id" class="form-control">
              <option value="{{ $game->cat_id }}">Stay Old Category</option>
              @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->title }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Game Name</label>
            <input type="text" name="title" value="{{ $game->title }}" class="form-control" placeholder="Enter Game Name ... " autocomplete="off" required>
          </div>

          <div class="form-group">
            <label>Game Discription</label>
            <textarea name="discription" class="form-control" rows="6" cols="80" required placeholder="Write The Game Discription Her ...">{{ $game->discription }}</textarea>
          </div>

        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Game Author</label>
            <input type="text" name="author_name" value="{{ $game->author_name }}" class="form-control" placeholder="Enter Game Author  ... " autocomplete="off" required>
          </div>
          <div class="form-group">
            <label>Game Year</label>
            <input type="text" name="game_year" value="{{ $game->game_year }}" class="form-control" placeholder="_ _ _ _" autocomplete="off" required>
          </div>
          <div class="form-group">
            <p>Game Photo</p>
            <input type="hidden" name="oldLogo" value="{{ $game->logo }}" required>
            <input type="file" name="logo">
          </div>
          <div class="form-group">
            <p>Game File - Torrent</p>
            <input type="hidden" name="oldFile" value="{{ $game->torrent_file }}" required>
            <input type="file" name="torrent_file">
          </div>
          <button type="submit" name="submit" class="btn btn-success btn-lg btn-block" style="margin-top:20px;"> <i class="fa fa-save"></i> Save Changes</button>
          <a href="{{ route('games.index') }}"class="btn btn-danger btn-lg btn-block"> <i class="fa fa-arrow-left"></i> Go Back</a>
        </div>
      </div>
    </form>
  </div>
@endsection
