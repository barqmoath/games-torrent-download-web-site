@extends('layouts.app')
@section('title','Game Torrent')

@section('header')
  @include('partials.header-h')
@stop

@section('content')

  <!-- s-extra
================================================== -->
<section class="s-extra">
    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>Games Platforms</h3>
            <div class="tagcloud">
              @foreach($platforms as $platform)
                <a href="{{ route('plat',['pid'=>$platform->id]) }}">{{ $platform->title }}</a>
              @endforeach
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->

    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3 style="margin-top: 5rem;">Games Categories</h3>
            <div class="tagcloud">
              @foreach($categories as $category)
                <a href="{{ route('cat',['catid'=>$category->id]) }}">{{ $category->title }}</a>
              @endforeach
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->

</section> <!-- end s-extra -->
@endsection
