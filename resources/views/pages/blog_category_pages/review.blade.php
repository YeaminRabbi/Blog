@extends('layouts.website_layout')

@section('content')

    <!--Categorie-->
    <section class="categorie-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="categorie-title">
                        <small>
                            <a href="index.html">Home</a>
                            <span class="arrow_carrot-right"></span> Review
                        </small>
                        <h3>Category : <span>Review</span> </h3>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/-->

    <!--mansory-layout-->
    <section class="masonry-layout col2-layout mt-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mt--10 ">
                    <!--cards-->
                    <div class="card-columns">
                        <!--Post-Start-->
                        @foreach($blogs_review as $key=>$review)

                        <div class="card">
                            <div class="post-card">
                            <div class="post-card-image">
                                <a href="{{route('allpost' , [$review->id,$review->category])}}">
                                    <img src="{{ asset('images/blog/'.date('Y/M/', strtotime($review->created_at)).'/'.$review->image) }}" alt="">
                                </a>
                            </div>
                            <div class="post-card-content">
                                <a href="blog-grid.html" class="categorie">{{$review->category}}</a>
                                <h5><a href="{{route('allpost' , [$review->id,$review->category])}}">{{$review->title}}</a> </h5>
                                <p>{{$review->highlightedText}}
                                </p>
                                <div class="post-card-info">
                                    <ul class="list-inline">
                                        @if (!empty($user_information[$key]->image))
                                            <li><a href="#"><img src="{{$user_information[$key]->image}}" alt=""></a></li>
                                        @else
                                            <li><a href=""><img src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" alt="IMG"></a></li>
                                        @endif
                                        <li>
                                            <a href="#">{{$review->name}}</a>
                                        </li>
                                        <li class="dot"></li>
                                        <li><?php

                                            echo date("d.m.Y", strtotime($review->created_at));


                                         ?></li>
                                    </ul>
                                </div>
                            </div>
                            </div><!--/-->
                        </div>
                        <!-- Post-End-->

                        @endforeach


                    </div>

                    <!--pagination-->
                    <div class="pagination mt-30">
                        @if ($blogs_review->lastPage() >1)
                        <ul class="list-inline">
                            <li class="{{$blogs_review->currentPage() == 1 ? 'disabled' : ''}}"><a class="" href="{{$blogs_review->url(1)}}"><i class="arrow_carrot-2left"></i></a>
                                @for($i=1; $i<=$blogs_review->lastPage();$i++)
                                <li class="siam {{$blogs_review->currentPage() == $i ? 'current' : ''}}">
                                  <a class='page-numbers' href='{{$blogs_review->url($i)}}'>{{$i}}</a></li>
                                @endfor
                                <li class="{{$blogs_review->currentPage() == $blogs_review->lastPage() ? 'disabled' : '' }}"><a class="disabled" href="{{$blogs_review->url($blogs_review->currentPage() +1 )}}"><i class="arrow_carrot-2right"></i></a></li>

                        </ul>
                        @endif
                    </div><!--/-->
                </div>


                <div class="col-lg-4 max-width">
                    <!--widget-latest-posts-->
                    <div class="widget ">
                        <div class="section-title">
                            <h5>Latest Posts</h5>
                        </div>
                        <ul class="widget-latest-posts">
                            @if (count($relatedposts)>0)
                            @foreach($relatedposts as $recentpost)
                            <li class="last-post">
                                <div class="image">
                                    <a href="{{route('allpost',[$recentpost->id,$recentpost->category])}}">
                                        <img src="{{ asset('images/blog/'.date('Y/M/', strtotime($recentpost->created_at)).'/'.$recentpost->image) }}" alt="">
                                    </a>
                                </div>
                                <div class="nb">1</div>
                                <div class="content">
                                    <p><a href="{{route('allpost',[$recentpost->id,$recentpost->category])}}">{{$recentpost->title}}</a></p>
                                    <small><span class="icon_clock_alt"></span>{{$recentpost->created_at->format('d.m.Y')}}</small>
                                </div>
                            </li>
                            @endforeach
                            @endif

                        </ul>
                    </div>
                    <!--/-->

                    <!--widget-categories-->
                    <div class="widget">
                        <div class="section-title">
                            <h5>Categories</h5>
                        </div>
                        <ul class="widget-categories">

                            <li>
                                <a href="{{route('health')}}" class="categorie">Health & Wealth </a>
                                <span class="ml-auto">{{$categoryhealthCount}} Posts</span>
                            </li>
                            <li>
                                <a href="{{route('brandstories')}}" class="categorie">Brand Stories</a>
                                <span class="ml-auto">{{$categorybrandstoriesCount}} Posts</span>
                            </li>
                            <li>
                                <a href="{{route('startups')}}" class="categorie">Startups</a>
                                <span class="ml-auto">{{$categorystartupsCount}} Posts</span>
                            </li>
                            <li>
                                <a href="{{route('travel')}}" class="categorie">Travel</a>
                                <span class="ml-auto">{{$categorytravelCount}} Posts</span>
                            </li>
                            <li>
                                <a href="{{route('review')}}" class="categorie">Review</a>
                                <span class="ml-auto">{{$categoryreviewCount}} Posts</span>
                            </li>
                            <li>
                                <a href="{{route('howto')}}" class="categorie">HowTo</a>
                                <span class="ml-auto">{{$categoryhowtoCount}} Posts</span>
                            </li>


                            <li>
                                <a href="{{route('lifestyle')}}" class="categorie">Lifestyle</a>
                                <span class="ml-auto">{{$categorylifestyleCount}} Posts</span>
                            </li>
                            <li>
                                <a href="{{route('education')}}" class="categorie">Education</a>
                                <span class="ml-auto">{{$categoryeducationCount}} Posts</span>
                            </li>

                            <li>
                                <a href="{{route('food')}}" class="categorie">Food</a>
                                <span class="ml-auto">{{$categoryfoodCount}} Posts</span>
                            </li>
                            <li>
                                <a href="{{route('career')}}" class="categorie">Career</a>
                                <span class="ml-auto">{{$categorycareerCount}} Posts</span>
                            </li>
                            <li>
                                <a href="{{route('law')}}" class="categorie">Law</a>
                                <span class="ml-auto">{{$categorylawCount}} Posts</span>
                            </li>

                        </ul>
                    </div>
                    <!--/-->

                </div>
            </div>
        </div>
    </section><!--/-->

@endsection
