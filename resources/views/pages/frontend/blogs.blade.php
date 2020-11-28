@extends('layouts.frontend')

@section('title', 'Blog')

@section('banner')
<div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>{{ $category ? $news->first()->category->category : '' }}</h4>
              <h2>Blog</h2>
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
                @foreach ($news as $item)
                    
                <div class="col-lg-6">
                    <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="{{ asset('storage/'.$item->image) }}" alt="">
                    </div>
                    <div class="down-content">
                        <span>{{ $item->category->category }}</span>
                        <a href="{{ route('berita', ['id'=>$item->id]) }}"><h4>{{ $item->title }}</h4></a>
                        <ul class="post-info">
                            <li><a href="#">{{ $item->author->name }}</a></li>
                            <li><a href="#">{{ date('d F Y', strtotime($item->created_at)) }}</a></li>
                        </ul>
                        <p>
                            {{ Str::limit(strip_tags($item->content), 50, '...') }}
                        </p>
                        <div class="post-options">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('berita', ['id'=>$item->id]) }}" class="more-button">Baca</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                @endforeach

              {{-- <div class="col-lg-12">
                <ul class="page-numbers">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection