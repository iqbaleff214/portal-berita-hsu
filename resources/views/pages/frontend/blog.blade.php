@extends('layouts.frontend')

@section('title', $news->title)

@section('banner')
<div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>{{ $news->category->category }}</h4>
              <h2>{{ $news->title }}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('content')
<section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="{{ asset('storage/'.$news->image) }}" alt="">
                  </div>
                  <div class="down-content">
                    <span>{{ $news->category->category }}</span>
                    <a href="post-details.html"><h4>{{ $news->title }}</h4></a>
                    <ul class="post-info">
                        <li><a href="#">{{ $news->author->name }}</a></li>
                        <li><a href="#">{{ date('d F Y', strtotime($news->created_at)) }}</a></li>
                    </ul>
                    {!! $news->content !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection