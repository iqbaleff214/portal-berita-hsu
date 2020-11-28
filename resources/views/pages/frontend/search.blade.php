@extends('layouts.frontend')

@section('title', 'Blog')

@section('banner')
<div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Pencarian: "{{ $cari }}"</h4>
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
        <div class="col-lg-8">
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
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="row">
              <div class="col-lg-12">
                <div class="sidebar-item search">
                  <form id="search_form" name="gs" method="POST" action="{{ route('cari') }}">
                    @csrf
                    <input type="text" name="cari" class="searchText" value="{{ $cari }}" placeholder="type to search..." autocomplete="on">
                  </form>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                  <div class="sidebar-heading">
                    <h2>Berita Terbaru</h2>
                  </div>
                  <div class="content">
                    <ul>
                        @foreach ($newsAll as $item)
                            
                        <li>
                            <a href="{{ route('berita', ['id'=>$item->id]) }}">
                                <h5>{{ $item->title }}</h5>
                                <span>{{ date('d F Y', strtotime($item->created_at)) }}</span>
                            </a>
                        </li>
                        @break($loop->iteration == 3)
                        @endforeach
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item categories">
                  <div class="sidebar-heading">
                    <h2>Kategori</h2>
                  </div>
                  <div class="content">
                    <ul>
                        @foreach ($categories as $item)
                        @continue($item->blog->count() == 0)
                            <li><a href="{{ route('blog', ['id'=>$item->id]) }}">{{ $item->category }}</a></li>
                        @endforeach
                    </ul>
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