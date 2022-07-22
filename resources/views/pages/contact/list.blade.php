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
                    <th style="text-align: center;">User Name</th>
                    <th style="text-align: center;">User's Subject</th>
                    <th style="text-align: center;">User's Message</th>
                    
                </tr>
                </thead>


                <tbody>
            @if (count($contactdetails)>0)
            @foreach ($contactdetails as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->subject}}</td>
                    <td>{{$contact->message}}</td>
                    
                   
                    

                   
                  
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