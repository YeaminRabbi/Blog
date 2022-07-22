@extends('layouts.website_layout')
@section('content')
    <!--author-->
    <section class="section author full-space mb-40 pt-55">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!--widget-author-->
                    <div class="widget-author inner-width">
                        <a href="#" class="image">
                            <img src="{{url($user->image)}}" alt="">
                        </a>
                        <h6><span>{{ $user->name }}</span></h6>

                        <p>
                            {{ $user->channel_name_description }}
                        </p>

                        <div class="social-media">
                            <ul class="list-inline">
                                <li>
                                    <a href=" {{ $user->facebook }}" class="color-facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href=" {{ $user->instagram }}" class="color-instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href=" {{ $user->twitter }}" class="color-twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href=" {{ $user->youtube }}" class="color-youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--mansory-layout-->
    <section class="masonry-layout col2-layout mt-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!--cards-->
                    <div class="card-columns">
                        <!--Post-1-->

                        @foreach($users_blogs_one as $blog)
                        <div class="card">
                            <div class="post-card post-full">
                                <div class="post-card-image">
                                    <a href="{{route('allpost' , [$blog->id,$blog->category])}}"><img src="{{ asset('images/blog/'.date('Y/M/', strtotime($blog->created_at)).'/'.$blog->image) }}" alt=""></a>
                                </div>
                                <div class="post-card-content">
                                    <a href="{{route('allpost' , [$blog->id,$blog->category])}}" class="categorie">{{$blog->category}}</a>
                                    <h5>
                                        <a href="{{route('allpost' , [$blog->id,$blog->category])}}">{{$blog->title}}</a>
                                    </h5>
                                    <p>{{$blog->highlightedText}}</p>
                                    <div class="post-card-info">
                                        <ul class="list-inline">
                                            <li>
                                                <a >
                                                    <img src="{{url($user->image)}}" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a>{{ $blog->name }}</a>
                                            </li>
                                            <li class="dot"></li>
                                            <li>
                                                <?php

                                                 echo date("d M, Y", strtotime($blog->created_at));

                                                ?>


                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/-->
                        </div>

                        @endforeach

                    </div>


                </div>

            </div>
        </div>
    </section>
    <!--/-->
@endsection

