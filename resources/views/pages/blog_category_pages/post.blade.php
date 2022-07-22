@extends('layouts.website_layout')

@section('content')


    <!--post-default-->
    <section class="section pt-55 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mb-20">
                    <!--Post-single-->
                    <div class="post-single">
                        <div class="post-single-image">
                            <img src="{{ asset('images/blog/'.date('Y/M/', strtotime($blogs->created_at)).'/'.$blogs->image) }}" alt="">
                        </div>
                        <div class="post-single-content">
                            <a href="" class="categorie">{{$blogs->category}}</a>
                            <h4>{{$blogs->title}} </h4>
                            <div class="post-single-info">
                                <ul class="list-inline">

                                    <li><a href="">{{$user->name}}</a> </li>
                                    <li class="dot"></li>
                                    <li>{{$blogs->created_at->format('d.m.Y')}}</li>
                                    <li class="dot"></li>
                                    <li> {{$countComments}} Comments</li>
                                </ul>
                            </div>
                        </div>

                        <div class="post-single-body">
                            <p>
                                {!!$blogs->description!!}
                            </p>

                            <div class="quote">
                                <div><i class="icon_quotations_alt"></i></div>
                                <p>
                                    {!!$blogs->highlightedText!!}
                                </p>

                            </div>

                        </div>


                    </div> <!--/-->




                    <div class="widget mb-50">
                        <div class="title">
                            <h5>Total Comments: {{$countComments}}</h5>
                        </div>




                            @foreach($comments as $data)
                            <ul class="widget-comments">
                              <li class="comment-item">

                                <li class="comment-item">
                                    <img src="https://image.shutterstock.com/image-vector/user-login-authenticate-icon-human-260nw-1365533969.jpg" alt="">
                                    <div class="content">
                                        <ul class="info list-inline">
                                            <li>{{$data->username}}</li>
                                            <li class="dot"></li>
                                            <li>{{$data->updated_at}}</li>
                                        </ul>
                                        <p>{{$data->comment}}
                                        </p>
                                        <div class="reply">
                                            <button class="btn-reply text-uppercase" id="reply-btn" onclick="showReplyForm('{{$data->id}}','{{$data->username}}')"
                                                style="
                                                background-color:#f67280;
                                                color:#ffffff !important;
                                                padding: 1px 10px;
                                                text-align:center;
                                                font-size:13px;
                                                border-radius:20px;
                                                font-weight:700 !important;
                                                text-transform: capitalize;


                                                ">
                                                <i class="arrow_back"></i> Reply</button>

                                        </div>

                                    </div>
                                </li>








                                          @foreach (App\CommentReply::where('comment_id', $data->id)->get() as $reply)
                                              <li class="comment-item reply" style="margin-left: 6rem;" >
                                                <img src="https://image.shutterstock.com/image-vector/user-login-authenticate-icon-human-260nw-1365533969.jpg" alt="">
                                                <div class="content">
                                                    <ul class="info list-inline">
                                                        <li>{{$reply->username}}</li>
                                                        <li class="dot"></li>
                                                        <li>{{$reply->created_at}}</li>
                                                    </ul>
                                                    <p>{{$reply->message}}
                                                    </p>
                                                    <div class="reply">
                                                        <button class="btn-reply text-uppercase" id="reply-btn"onclick="showReplyForm('{{$data->id}}','{{$data->username}}')" style="
                                                        background-color:#f67280;
                                                        color:#ffffff !important;
                                                        padding: 1px 10px;
                                                        text-align:center;
                                                        font-size:13px;
                                                        border-radius:20px;
                                                        font-weight:700 !important;
                                                        text-transform: capitalize;


                                                        ">
                                                            <i class="arrow_back"></i> Reply</button>

                                                    </div>




                                               </div>
                                            </li>
                                          @endforeach



                                                          <!-- Another Comment Reply Form Start -->
                                                          @guest
                                                          <a href="{{route('login')}}" class="button" style=" background-color:#f67280;
                                                          color:#ffffff !important;
                                                          padding: 1px 10px;
                                                          text-align:center;
                                                          font-size:13px;
                                                          border-radius:20px;
                                                          font-weight:700 !important;
                                                          text-transform: capitalize;">login to comment</a>
                                                          @else
                                                          <div id="reply-form-{{$data->id}}" style="display: none;">


                                                                <h1 class="title" id="reply-title">Leave a Reply <small><a style="display:none;" href="#" id="cancel-comment-reply-link" >Cancel reply</a></small></h1>
                                                              <form class="widget-form" method="POST" action="{{route('commentReply.store',$data->id)}}" id="main_contact_form">
                                                                  @csrf
                                                                 <div class="col-md-12">
                                                                    <div class="form-group">

                                                                        <textarea class="form-control" required="required" maxlength="65525" rows="8" cols="45" name="message" id="reply-form-{{$data->id}}-text"></textarea>

                                                                    </div>


                                                                 </div>

                                                                      <button type="submit" value="Post Comment" class="submit btn-custom">Reply Comment</button>
                                                              </form>



                                                          </div><!-- #respond -->

                                                      @endguest
                                                          <!-- Another Comment Reply Form End -->




                                                      <!-- /.media -->


                                                </li>
                                              @endforeach



                                @guest
                                <a href="{{route('login')}}" class="button"
                                style=" background-color:#f67280;
                                                          color:#ffffff !important;
                                                          padding: 1px 10px;
                                                          text-align:center;
                                                          font-size:13px;
                                                          border-radius:20px;
                                                          font-weight:700 !important;
                                                          text-transform: capitalize;">login to comment</a>
                                @else

                                    <h1 class="title" id="reply-title">Leave a Reply <small><a style="display:none;" href="#" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a></small></h1>
                                    <form class="widget-form" method="POST" action="{{route('comment.store',$blogs->id)}}">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <textarea class="form-control"  required="required" maxlength="65525" rows="8" cols="45" name="comment" id="comment"></textarea>

                                            </div>


                                         </div>


                                            <button type="submit" value="Post Comment" class="submit btn-custom">Comment</button>
                                    </form>
                            @endguest

                    </div> <!-- This is my close div -->


            </div>



                <div class="col-lg-4 max-width">
                    <!--widget-author-->
                    <div class="widget">

                        @if ($user->channel_name != null)
                            <div class="widget-author">
                                <a href="{{ route('individualAuthorBlogs', $user->id ) }}" class="image">
                                    <img src="{{url($user->image)}}" alt="">

                                    <h6>
                                        <span>{{$user->channel_name}}</span>
                                    </h6>
                                </a>

                                <p>
                                    {{$user->channel_name_description}}
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
                        @else
                        <div class="widget-author">
                            <a  class="image">
                                <img src="{{asset('assets/img/person.png')}}" alt="">

                                <h6>
                                    <span>{{$user->name}}</span>
                                </h6>
                            </a>
                            <ul class="widget-categories">

                                <li>
                                    {{--  <a class="categorie">There is no channel of this user</a>  --}}

                                </li>
                            </ul>
                            <p>
                                {{$user->channel_name_description}}
                            </p>



                        </div>
                        @endif

                    </div>
                    <!--/-->

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
                    </div><!--/-->



                </div>
            </div>
        </div>
    </section><!--/-->

    <script>
        function showReplyForm(commentId,username){
        var x = document.getElementById(`reply-form-${commentId}`);
        var input = document.getElementById(`reply-form-${commentId}-text`);

        if(x.style.display === "none")
        {
            x.style.display = "block";
            input.innerText = `@${username}` ;
        }
        else
        {
            x.style.display = "none";
        }
    }
    </script>
@endsection

