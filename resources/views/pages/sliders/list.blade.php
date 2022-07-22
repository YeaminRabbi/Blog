@extends('layouts.admin_layout')

@section('content')


<div class="content-page">
    <div class="content">
      
        <!-- Start Content-->
        <div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
         
          
            @include('alert.messages')
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

           
                <thead>
                <tr>
                    <th style="text-align: center;">Serial Number</th>
                    <th style="text-align: center;">Slider Title</th>
                    <th style="text-align: center;">littleDescription1</th>
                    <th style="text-align: center;">littleDescription2</th>
                    <th style="text-align: center;">littleDescription3</th>
                    
                    <th style="text-align: center;">Image</th>
                    <th style="text-align: center;">Action</th>
                    
                </tr>
                </thead>


                <tbody>
            @if (count($sliders)>0)
            @foreach ($sliders as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->sliderTitle}}</td>
                    <td>{{$slider->littleDescription1}}</td>
                    <td>{{$slider->littleDescription2}}</td>
                    <td>{{$slider->littleDescription3}}</td>
                   
                    <td>
                        <img style="height: 70px; width:auto;" src="{{url($slider->image)}}" alt="image">
                          
                    </td>

                    <td>
                        <div class="row">
                          <div>
                            <a  href="{{route('admin.sliders.edit' , $slider->id)}}" style="color: white;" class="btn btn-primary m-2"> Edit </a>
                          </div>
                          <div >
                            <form action="{{route('admin.sliders.destroy', $slider->id)}}" method="POST">
                              @csrf
                              @method('Delete')
                              <input type="submit" name="submit" value="Delete" class="btn btn-danger m-2">
                            </form>
                            
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