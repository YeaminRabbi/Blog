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
                               
                                <li class="breadcrumb-item active">Channel Name</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Channel</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            @include('alert.messages')


                @if ($user->channel_name == null)
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <form action="{{route('userCreateChannelName')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Channel Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="channel_name" id="simpleinput" class="form-control" placeholder="Write a catchy channel Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Channel Description</label>
                                        <div class="col-md-10">
                                            <input type="text" name="channel_name_description" id="simpleinput" class="form-control" placeholder="Write description" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Facebook Link</label>
                                        <div class="col-md-10">
                                            <input type="text" name="facebook" id="simpleinput" class="form-control" placeholder="Enter your Facebook Page Or Profile Link">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Instagram Link</label>
                                        <div class="col-md-10">
                                            <input type="text" name="instagram" id="simpleinput" class="form-control" placeholder="Enter your Instagram Page Or Profile Link">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Twitter Link</label>
                                        <div class="col-md-10">
                                            <input type="text" name="twitter" id="simpleinput" class="form-control" placeholder="Enter your Twitter Profile Link">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Youtube Link</label>
                                        <div class="col-md-10">
                                            <input type="text" name="youtube" id="simpleinput" class="form-control" placeholder="Enter your Youtube Channel Link">
                                        </div>
                                    </div>


                                   
                                    <div class="form-group row">
                                        <p>Select an image</p>
                                        <input type="file" class="filestyle" data-btnClass="btn-primary" id="image" name="image" placeholder="Enter an image" required>
                                    </div>

                                    

                                    
                                


                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                

                                
                                </form>
                            </div>
                        </div>

                    </div>
                @endif


                @if ($user->channel_name != null)
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <form action="{{route('userCreateChannelNameUpdate')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Your Channel Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="channel_name" id="simpleinput" value="{{ $user->channel_name }}" class="form-control" placeholder="Write a catchy channel Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Enter your Channel Description</label>
                                        <div class="col-md-10">
                                            <input type="text" name="channel_name_description" value="{{ $user->channel_name_description}}" id="simpleinput" class="form-control" placeholder="Write a catchy channel Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Facebook Profile Link</label>
                                        <div class="col-md-10">
                                            <input type="text" name="facebook" value="{{ $user->facebook}}" id="simpleinput" class="form-control" placeholder="Enter your Facebook Page Or Profile Link">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Instagram Profile Link</label>
                                        <div class="col-md-10">
                                            <input type="text" name="instagram" value="{{ $user->instagram}}" id="simpleinput" class="form-control" placeholder="Enter your Instagram Page Or Profile Link">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Twitter Profile Link</label>
                                        <div class="col-md-10">
                                            <input type="text" name="twitter" value="{{ $user->twitter}}" id="simpleinput" class="form-control" placeholder="Write a catchy channel Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Youtube Channel Link</label>
                                        <div class="col-md-10">
                                            <input type="text" name="youtube" value="{{ $user->youtube}}" id="simpleinput" class="form-control" placeholder="Enter your Youtube Channel Link">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <p>Select an image</p>
                                       
                                        <input type="file" class="filestyle" data-btnClass="btn-primary" id="image" name="image" placeholder="Enter an image">
                                        <img src="{{url($user->image)}}" class="img-thumbnail" style="height: 70px;width:auto;">
                                    </div>
                                    
                                


                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                

                                
                                </form>
                            </div>
                        </div>

                    </div>
                @endif
      
                                    
                  
                    

            
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

                