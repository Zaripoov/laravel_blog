@extends('layouts.category_layout')

@section('title', 'Markedia - Marketing Blog Template :: Category')

@section('page-title')

    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2> {{ $tag->title }}</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $tag->title }}</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

@endsection

@section('content')

    <div class="page-wrapper">
        <div class="blog-custom-build">

            @foreach($posts as $post)
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="{{ $post->title }}">
                            <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                        <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="">{{ $post->title }}</a></h4>
                        {!! $post->description !!}
                        <small><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}" title="">{{ $post->category->title }}</a></small>
                        <small>{{ $post->getPostDate() }}</small>
                        <small><a href="#" title=""><i class="fa fa-eye"></i> {{$post->views }}</a></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
                <hr class="invis">
            @endforeach

        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Ссылка на предыдущую страницу -->
                    @if (!$posts->onFirstPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $posts->previousPageUrl() }}">Назад</a>
                        </li>
                    @endif


                <!-- Элементы страничной навигации -->
                    @foreach ($posts as $element)
                    <!-- Разделитель "Три точки" -->
                        @if (is_string($element))
                            <li class="page-item">{{ $element }}</li>
                        @endif

                    <!-- Массив ссылок -->
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item">{{ $page }}</li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                <!-- Ссылка на следующую страницу -->
                    @if ($posts->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a>
                        </li>
                    @endif

                </ul>
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->

@endsection
