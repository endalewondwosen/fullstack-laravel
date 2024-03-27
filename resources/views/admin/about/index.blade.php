@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-info">Home About</h2>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('add.about') }}">
                        <button class="btn btn-info">Add About</button>
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header"> All About </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sn No</th>
                                    <th scope="col"> Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php($i=1)
                               
                        @foreach ($abouts as $about)
                               <tr>
                                <td>{{ $i++ }}</td> 
                                {{-- <td scope="row ">{{$brands->firstItem()+$loop->index }}</td> --}}
                                <td>{{ $about->title }}</td>
                                <td>{{$about->short_desc }}</td>
                                <td>{{$about->long_desc }}</td>
                              @if ($about->created_at == null)
                              <td>
                                <spap class="text-danger">No Data Set</span>  
                              </td>
                            @else
                        <td>{{ $about->created_at->diffForHumans()}}</td>
                   {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td> --}}
                             @endif
                             <th><a href="{{ url('/edit/about/'.$about->id) }}" class="btn btn-info">Edit</a></th>
                             <th><a href="{{ url('/delete/about/'.$about->id) }}" class="btn btn-danger">Delete</a></th>
                        </tr>
                        @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $slider->links() }} --}}
                    </div>
                </div>
               
            </div>
@endsection
