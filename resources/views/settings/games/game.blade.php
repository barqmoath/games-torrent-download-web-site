@extends('layouts.setting')
@section('title')
  {{ $game->gtitle }}
@stop

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img style="max-width:100%;height:auto;margin:10px;border:3px solid #EEE;border-radius:8%;" src="{{ asset('storage/images/' . $game->glogo) }}" alt="">
      </div>
      <div class="col-md-8 text-center">
        <h1 style="margin-top:100px;">{{ $game->gtitle }}</h1>
        <h2 style="text-transform: uppercase;color:#CCC;">{{ $game->author_name }} . {{ $game->game_year }} </h2>
        <h3 style="color:#CCC;">{{ $game->ptitle }} . {{ $game->cattitle }}</h3>
        <a href="{{ route('games.index') }}" class="btn btn-danger btn-lg" style="width:200px;margin-top:20px;"> <i class="fa fa-arrow-left"></i> Go Back</a>
        <a href="{{ asset('storage/files/' . $game->gfile ) }}" target="_blank" class="btn btn-success btn-lg" style="width:200px;margin-top:20px;"> <i class="fa fa-download"></i> Torrent File</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p style="font-size:1.5rem; margin:25px;text-align:center;" >{{ $game->gdisc }}</p>
      </div>
    </div>
  </div>
@endsection
