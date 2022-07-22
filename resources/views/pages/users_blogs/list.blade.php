@extends('layouts.user_layout')

@section('content')


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h1 class="header-title">All Categories</h1>
            <div class="button-list" style="padding: 30px; display:flex;justify-content:center;" >
                <button type="button" class="btn btn-warning btn-rounded width-md waves-effect waves-light"> <i class="far fa-lightbulb"></i> <span>Startup</span> </button>
                <button type="button" class="btn btn-info btn-rounded width-md waves-effect waves-light"><i class="fas fa-file-medical"></i> <span> Health & Wellness</span></button>
                <button type="button" class="btn btn-success btn-rounded width-md waves-effect waves-light"><i class="fas fa-gavel"></i><span> Law</span></button>
                <button type="button" class="btn btn-purple btn-rounded width-md waves-effect waves-light"><i class="fas fa-shopping-bag"></i><span> Lifestyle</span></button>
                <button type="button" class="btn btn-warning btn-rounded width-md waves-effect waves-light"><i class="fas fa-pencil-alt"></i><span> Review</span></button>
                <button type="button" class="btn btn-danger btn-rounded width-md waves-effect waves-light"><i class="fas fa-question"></i><span> How To</span></button>
                <button type="button" class="btn btn-pink btn-rounded width-md waves-effect waves-light"><i class="fas fa-tshirt"></i><span> Brand Stories</span></button>

                <button type="button" class="btn btn-dark btn-rounded width-md waves-effect waves-light"><i class="fas fa-utensils"></i> <span>  Food </span></button>
                <button type="button" class="btn btn-dark btn-rounded width-md waves-effect waves-light"><i class="fas fa-bus"></i> <span>  Travel</span></button>
                <button type="button" class="btn btn-dark btn-rounded width-md waves-effect waves-light"><i class="fas fa-briefcase"></i> <span>  Career </span></button>
                <button type="button" class="btn btn-dark btn-rounded width-md waves-effect waves-light"><i class="fas fa-university"></i> <span>  Education </span></button>
            </div>

            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                <thead>
                <tr>
                    <th style="text-align: center;">Serial Number</th>
                    <th style="text-align: center;">Post Category</th>
                    <th style="text-align: center;">Title</th>
                    <th style="text-align: center;">Image</th>
                    <th style="text-align: center;">Satus</th>

                    <th style="text-align: center;">Action</th>

                </tr>
                </thead>


                <tbody>
            @if (count($users_blogs)>0)
            @foreach ($users_blogs as $key => $blog)
                <tr>

                    <td>{{$key+1}}</td>
                    <td>{{$blog->category}}</td>
                    <td>{{$blog->title}}</td>

                    <td>
                        <img style="height: 70px; width:auto;" src="{{ asset('images/blog/'.$blog->created_at->format('Y/M/').'/'.$blog->image) }}" alt="image">

                    </td>

                    <td>
                        <?php

                            if($blog->status == 0)
                            {
                        ?>
                        <a style="color: white;" class="btn btn-warning mt-2 btn-block"> Pending </a>

                        <?php

                            }
                            elseif($blog->status == 1)
                            {
                        ?>

                        <a style="color: white;" class="btn btn-success mt-2 btn-block"> Published </a>


                        <?php
                            }

                        ?>
                    </td>


                    <td>
                        <div class="row">
                          <div>
                            <a  href="{{route('users.users_blogs.edit' , $blog->id)}}" style="color: white;" class="btn btn-primary m-2"> Edit </a>
                          </div>
                          <div >


                            <a  href="{{route('users.users_blogs.delete' , $blog->id)}}" style="color: white;" class="btn btn-danger m-2"> Delete </a>


                          </div>
                        </div>
                      </td>

                </tr>

            @endforeach
            @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
@endsection
