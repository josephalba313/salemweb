@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ $first_post->featured }}" alt="{{ $first_post->title }}">
                        <div class="overlay"></div>
                        <a href="{{ $first_post->featured }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('singlepost', ['slug' => $first_post->slug ]) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{ route('singlepost', ['slug' => $first_post->slug ]) }}">{{ $first_post->title }}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="{{ $first_post->created_at }}">
                                                {{ $first_post->created_at->diffForHumans() }}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('feCategory', ['id' => $first_post->category_id]) }}">{{ $first_post->category->name }}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ $second_post->featured }}" alt="{{ $second_post->title }}">
                        <div class="overlay"></div>
                        <a href="{{ $second_post->featured }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('singlepost', ['slug' => $second_post->slug ]) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{ route('singlepost', ['slug' => $second_post->slug ]) }}">{{ $second_post->title }}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="{{ $second_post->created_at }}">
                                                {{ $second_post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('feCategory', ['id' => $second_post->category_id]) }}">{{ $second_post->category->name }}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ $third_post->featured }}" alt="{{ $third_post->title }}">
                        <div class="overlay"></div>
                        <a href="{{ $third_post->featured }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('singlepost', ['slug' => $third_post->slug ]) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{ route('singlepost', ['slug' => $third_post->slug ]) }}">{{ $third_post->title }}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="{{ $third_post->created_at }}">
                                                {{ $third_post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('feCategory', ['id' => $third_post->category_id]) }}">{{ $third_post->category->name }}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>

@endsection