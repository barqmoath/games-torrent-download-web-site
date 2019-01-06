@extends('layouts.app')
@section('title','Game Photos')

@section('header')
  @include('partials.header')
@stop

@section('content')
<!-- s-content
================================================== -->
<section class="s-content">

      <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Game Photos</h1>

            <p class="lead">You Can Also Download Games From Here</p>
        </div>
    </div>

    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

              @forelse($games as $game)
              <article class="masonry__brick entry format-standard" data-aos="fade-up">
                  <div class="entry__thumb">
                      <a href="{{ asset('storage/files/' . $game->torrent_file) }}" target="_blank" class="entry__thumb-link">
                          <img style="width:100%;" src="{{ asset('storage/images/' . $game->logo) }}" srcset="{{ asset('storage/images/' . $game->logo) }}, {{ asset('storage/images/' . $game->logo) }}" alt="Game Logo">
                      </a>
                  </div>
              </article> <!-- end article -->
              @empty
                <center><h2>No Photos Her</h2></center>
              @endforelse

        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->


</section> <!-- s-content -->
@endsection
