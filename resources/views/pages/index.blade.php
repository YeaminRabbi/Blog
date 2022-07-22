@extends('layouts.website_layout')

@section('content')
    <!--carousel-hero-->
    <section class="section carousel-hero">
        <div class="owl-carousel">
            <div class="hero d-flex align-items-center " style="background-image: url('assets/img/hero/2.jpg')">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                            <div class="hero-content">
                                <a href="blog-grid.html" class="categorie">travel</a>
                                <h2>
                                    <a href="post-default.html">10 Best and Most Beautiful Places to Visit in Italy </a>
                                </h2>

                                <div class="post-card-info">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="author.html">
                                                <img src="assets/img/author/1.jpg" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="author.html">David Smith</a>
                                        </li>
                                        <li class="dot"></li>
                                        <li>January 15, 2021</li>
                                        <li class="dot"></li>
                                        <li>10 Min Reads</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero d-flex align-items-center" style="background-image: url('assets/img/hero/1.jpg')">
                 <div class="container-fluid">
                     <div class="row">
                         <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                            <div class="hero-content">
                                <a href="blog-grid.html" class="categorie">Livestyle</a>
                                <h2><a href="post-default.html">Top 10 Fashion Trends from Spring/Summer 2021 Fashion Weeks </a></h2>
                                <div class="post-card-info">
                                    <ul class="list-inline">
                                        <li><a href="author.html"><img src="assets/img/author/1.jpg" alt=""></a></li>
                                        <li><a href="author.html">David smith</a></li>
                                        <li class="dot"></li>
                                        <li>January 12, 2021</li>
                                        <li class="dot"></li>
                                        <li>10 Min Reads</li>
                                    </ul>
                                </div>
                            </div>
                         </div>
                     </div>
                 </div>
            </div>
            <div class="hero d-flex align-items-center " style="background-image: url('assets/img/hero/3.jpg')">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                            <div class="hero-content">
                                <a href="blog-grid.html" class="categorie">Travel</a>
                                <h2>
                                    <a href="post-default.html">Top 10 Forests That Every Nature Lover Must Visit</a>
                                </h2>

                                <div class="post-card-info">
                                    <ul class="list-inline">
                                        <li><a href="author.html"><img src="assets/img/author/1.jpg" alt=""></a></li>
                                        <li><a href="author.html">David Smith</a></li>
                                        <li class="dot"></li>
                                        <li>January 15, 2021</li>
                                        <li class="dot"></li>
                                        <li>10 Min Reads</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/-->


    <!--masonry-layout-->
    <section class="mt-40 masonry-layout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-columns">
                        @foreach($blogs as $blog)
                        <!--Post-1-->
                        <div class="card">
                            <div class="post-card">
                                <div class="post-card-image">
                                    <a href="{{route('allpost' , [$blog->id,$blog->category])}}">
                                    <img src="{{ asset('images/blog/'.date('Y/M/', strtotime($blog->created_at)).'/'.$blog->image) }}" alt="img">
                                    </a>

                                </div>
                                <div class="post-card-content">
                                    <a href="{{route('allpost' , [$blog->id,$blog->category])}}" class="categorie">{{$blog->category}}</a>
                                    <h5>
                                        <a href="{{route('allpost' , [$blog->id,$blog->category])}}">{{$blog->title}}</a>
                                    </h5>
                                    <p>{{$blog->highlightedText}}
                                    </p>
                                    <div class="post-card-info">
                                        <ul class="list-inline">

                                            <li>
                                                <a>{{$blog->name}}</a>
                                            </li>
                                            <li class="dot"></li>
                                            <li><?php

                                                echo date("d.m.Y", strtotime($blog->created_at));


                                             ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/-->
                        @endforeach

                    </div>

                    <!--pagination-->
                    <div class="pagination mt-30">
                        @if ($blogs->lastPage() >1)
                        <ul class="list-inline">
                            <li class="{{$blogs->currentPage() == 1 ? 'disabled' : ''}}"><a class="" href="{{$blogs->url(1)}}"><i class="arrow_carrot-2left"></i></a>
                                @for($i=1; $i<=$blogs->lastPage();$i++)
                                <li class="siam {{$blogs->currentPage() == $i ? 'current' : ''}}">
                                  <a class='page-numbers' href='{{$blogs->url($i)}}'>{{$i}}</a></li>
                                @endfor
                                <li class="{{$blogs->currentPage() == $blogs->lastPage() ? 'disabled' : '' }}"><a class="disabled" href="{{$blogs->url($blogs->currentPage() +1 )}}"><i class="arrow_carrot-2right"></i></a></li>

                        </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection

