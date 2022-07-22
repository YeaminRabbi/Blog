@extends('layouts.user_layout')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@section('content')




<div class="content-page" style="overflow-y:scroll;position:relative; height: 800px;">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                               
                                <li class="breadcrumb-item active">Basic Inputs</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Insert table</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            @include('alert.messages')
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Start Writing your blog posts</h4>
                                    
                        <!-- Custom Modals -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

                                    <h4 class="header-title" style="color: red; text-align:center;font-size:24px;">Read these important things before upload a blog</h4>
                                    <div class="button-list text-center" style="padding: 2rem;">   
                                        <a href="#custom-modal" class="btn btn-secondary waves-effect width-md" data-animation="blur" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a">Blog Title</a>
                                        <a href="#custom-modal1" class="btn btn-secondary waves-effect width-md" data-animation="blur" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a">Blog Description</a>
                                        <a href="#custom-modal2" class="btn btn-secondary waves-effect width-md" data-animation="blur" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a">Blog Highlighted Paragraph</a>
                                        <a href="#custom-modal3" class="btn btn-secondary waves-effect width-md" data-animation="blur" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a">Blog Image</a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- End row -->
                        

        <!-- Modal -->
         <div id="custom-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Modal title</h4>
            <div class="custom-modal-text">
               <h1>Blog Title</h1>
                <p style="font-weight:bold; font-size:20px;">50-60 characters
                Length. Title tags should be between 50-60 characters in length. Google has not specifically come out and said that title tags should be this length; however, if your title is longer than 60 characters, you risk the chance of it becoming cut off in the middle.
                </p>
               
            </div>
        </div>


        <div id="custom-modal1" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Modal title</h4>
            <div class="custom-modal-text">
              
                <h1>Blog Description</h1>
                <p style="font-weight:bold; font-size:20px; ">New Googles meta description length is up to 920 pixels, which might allow for up to 158 characters.</p>
            </div>
        </div>

        <div id="custom-modal2" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Modal title</h4>
            <div class="custom-modal-text">
              
                <h1>Blog Higlighted Description</h1>
                <p style="font-weight:bold; font-size:20px; ">Blog highlighted Description will be shown as a thumbnail of blog.So this should be more atttractive because at a first glance we only see the blog thumbnail details then we read that blog.</p>
            </div>
        </div>


        <div id="custom-modal3" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Modal title</h4>
            <div class="custom-modal-text">
              
                <h1>Blog Image</h1>
                <p style="font-weight:bold; font-size:20px; ">The Image of every blog will be 1900*900 Dimention. Which means Height: 1900px Width:900px</p>
            </div>
        </div>

        

      
                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <form action="{{route('users.users_blogs.store')}}" enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    {{method_field('PUT')}}
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Blog Title</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="title" id="simpleinput" class="form-control" placeholder="Write a catchy blog title">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label">Select category</label>
                                                        <div class="col-md-10">
                                                            <select class="form-control selectpicker" name="category" data-style="btn-primary">
                                                                <option style="display: none;">Select a category</option>
                                                                <option value="startups">Startups</option>
                                                                <option value="health">Health & Wellness</option>
                                                                <option value="law">Law</option>
                                                                <option value="lifestyle">Lifestyle</option>
                                                                <option value="review">Review</option>
                                                                <option value="howto">How To</option>
                                                                <option value="brandstories">Brand Stories</option>
                                                                <option value="food">Food</option>
                                                                <option value="travel">Travel</option>
                                                                <option value="career">Career</option>
                                                                <option value="education">Education</option>
                                                            </select>
                                                           
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="example-textarea">Blog Description</label>
                                                        <div class="col-md-10">
                                                            <textarea id="my-editor"  name="description" class="form-control"></textarea>
                                                        </div>
                                                        
                                                    </div>
                                                    



                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" for="example-textarea">Highlighted Paragraph</label>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" name="highlightedText" id="text" onkeyup="count();" rows="15"  placeholder="Write a highlighted text for this blog"></textarea>
                                                        </div>
                                                        <p style="text-align:center" id="total">Total Characters in highlighted text:0</p>
                                                    </div>



                                                    <div class="form-group row">
                                                        <p>Select an image</p>
                                                        <input type="file" class="filestyle" data-btnClass="btn-primary" id="image" name="image" placeholder="Enter an image">
                                                    </div>
                                                    



                                                    <button type="submit" name="submit" class="btn btn-primary">Create Blog</button>
                                                   

                                                  
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                      
                        <!-- end row -->


                    

            
        </div> <!-- end container-fluid -->

    </div> <!-- end content -->

    

   

</div>






<script src="{{asset('anotherassets/js/vendor.min.js')}}"></script>

<script src="{{asset('anotherassets/libs/switchery/switchery.min.js')}}"></script>
<script src="{{asset('anotherassets/libs/select2/select2.min.js')}}"></script>

<script src="{{asset('anotherassets/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('anotherassets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

<script src="{{asset('anotherassets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js')}}"></script>


  <!-- App js -->
  <script src="assets/js/app.min.js"></script>

<script src="//cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
<script>
var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};

CKEDITOR.replace('my-editor', options);
</script>



<script type="text/javascript">
    function count()
    {
      var total=document.getElementById("text").value;
      total=total.replace(/\s/g, '');
      document.getElementById("total").innerHTML="Total Characters:"+total.length;
    }
    </script>



@endsection

                