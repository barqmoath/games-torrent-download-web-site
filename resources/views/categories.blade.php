@extends('layouts.app')
@section('title')
  {{ $category->title }}
@stop

@section('header')
  @include('partials.header')
@stop

@section('content')
<!-- s-content
================================================== -->
<section class="s-content">

      <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>{{ $category->title }}</h1>

            <p class="lead">{{ $category->title }} Category and All Platforms</p>
        </div>
    </div>

    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

              @forelse($games as $game)
              <article class="masonry__brick entry format-standard" data-aos="fade-up">

                  <div class="entry__thumb">
                      <a href="{{ asset('storage/files/' . $game->gfile) }}" target="_blank" class="entry__thumb-link">
                          <img style="width:100%;" src="{{ asset('storage/images/' . $game->glogo) }}" srcset="{{ asset('storage/images/' . $game->glogo) }}, {{ asset('storage/images/' . $game->glogo) }}" alt="Game Logo">
                      </a>
                  </div>

                  <div class="entry__text">
                      <div class="entry__header">

                          <div class="entry__date">
                              <p style="margin-bottom:0rem;">{{ $game->author_name }} . {{ $game->game_year }}</p>
                          </div>
                          <h1 class="entry__title"><a href="single-standard.html">{{ $game->gtitle }}</a></h1>

                      </div>
                      <div class="entry__excerpt">
                          <p style="text-align:center;" >
                              {{ $game->gdisc }}
                          </p>
                      </div>
                      <div class="entry__meta">
                          <span class="entry__meta-links">
                            <a href="{{ route('plat',['pid'=>$game->pid]) }}" target="_blank">{{ $game->ptitle }}</a>
                            <a href="{{ route('cat',['catid'=>$game->catid]) }}" target="_blank">{{ $game->cattitle }}</a>
                          </span>
                      </div>
                  </div>

              </article> <!-- end article -->
              @empty
                <center><h2>No Games Her</h2></center>
              @endforelse

        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->


</section> <!-- s-content -->
@endsection
