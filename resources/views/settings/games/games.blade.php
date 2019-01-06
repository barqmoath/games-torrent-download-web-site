@extends('layouts.setting')
@section('title','Games')

@section('content')



<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h1 class="heading-h1">Games</h1>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2 text-right">
      <a href="{{ route('games.index') }}" style="margin-top:20px;" class="btn btn-secondary"> <i class="fa fa-refresh"></i> </a>
    </div>
    <div class="col-md-4">
      <form style="width:100%;" class="" action="{{ route('games.index') }}" method="get">
        <input type="text" name="s" class="form-control" style="margin-top:20px;" placeholder="Search ..." autocomplete="off">
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">GAME TITLE</th>
            <th scope="col">AUTHOR</th>
            <th scope="col">PLATFORM</th>
            <th scope="col">CATEGORY</th>
            <th scope="col">YEAR</th>
            <th scope="col">UPLOAD DATE</th>
            <th scope="col" class="text-center">ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          @forelse($games as $game)
          <tr>
            <td>{{ $game->gtitle }}</td>
            <td>{{ $game->author_name }}</td>
            <td>{{ $game->ptitle }}</td>
            <td>{{ $game->cattitle }}</td>
            <td>{{ $game->game_year }}</td>
            <td>{{ Carbon\Carbon::parse($game->created_at)->format('d-m-Y') }}</td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                  <a href="{{ route('games.show',['id'=>$game->gid]) }}" class="btn btn-sm btn-success" style="width: 75px;">Show</a>
                  <a href="{{ route('games.edit',['id'=>$game->gid]) }}" class="btn btn-sm btn-primary" style="width: 75px;">Edit</a>
                  <a href="{{ route('games.destroy',['id'=>$game->gid, 'logo' => $game->glogo, 'file' => $game->gfile]) }}" onclick="return confirm('Are You Sure ?')" class="btn btn-sm btn-danger" style="width: 75px;">Delete</a>
                </div>
              </td>
          </tr>
          @empty
            <h3>Empty</h3>
          @endforelse
        </tbody>
      </table>
      {{ $games->links('settings.games.pag') }}
    </div>
  </div>
</div>
@endsection
