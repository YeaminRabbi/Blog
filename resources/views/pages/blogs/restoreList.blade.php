@extends('layouts.admin_layout')

@section('content')


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th style="text-align: center;">Serial Number</th>
                    <th style="text-align: center;">Post Category</th>
                    <th style="text-align: center;">Title</th>
                    <th style="text-align: center;">Image</th>
                    <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody>
            @if (count($blogs)>0)
            @foreach ($blogs as $blog)
                <tr>

                    <td>{{$blog->id}}</td>
                    <td>{{$blog->category}}</td>
                    <td>{{$blog->title}}</td>
                    <td>
                        <img style="height: 70px; width:auto;" src="{{ asset('images/blog/'.$blog->created_at->format('Y/M/').'/'.$blog->image) }}" alt="image">

                    </td>
                    <td>
                     <div class="row">
                         {{-- Restore Route --}}
                        <div >
                            <form action="{{route('admin.blogs.restoreData', $blog->id)}}" method="GET">
                              @csrf
                              <input type="submit" name="submit" value="Restore Data" class="btn btn-danger m-2">
                            </form>
                        </div>
                         {{-- Restore Route --}}

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
