@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="float-right">
                    <h4>service</h4>
                <a class="d-inline-flex" href="{{ route('add.service') }}"> <button class="btn btn-info ">Add Service</button></a>
                </div>
                <br><br>
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle fa-lg me-2"></i> <strong>{{ session('success') }}!</strong>
                            {{-- You should check in on some of those fields below. --}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header"> All service </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sn No</th>
                                    <th scope="col"> Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php($i=1)
                               
                        @foreach ($services as $service)
                               <tr>
                                <td>{{ $i++ }}</td> 
                                {{-- <td scope="row ">{{$brands->firstItem()+$loop->index }}</td> --}}
                                <td>{{ $service->title }}</td>
                                <td>{{$service->short_desc }}</td>
                                <td><img src="{{ asset($service->image) }}" style="height:40px,width:70px" ></td>
                              @if ($service->created_at == null)
                              <td>
                                <spap class="text-danger">No Data Set</span>  
                              </td>
                            @else
                        <td>{{ $service->created_at->diffForHumans()}}</td>
                   {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td> --}}
                             @endif
                             <th><a href="{{ url('/edit/service/'.$service->id) }}" class="btn btn-info">Edit</a></th>
                             <th><a href="{{ url('/delete/service/'.$service->id) }}" class="btn btn-danger">Delete</a></th>
                        </tr>
                        @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $slider->links() }} --}}
                    </div>
                </div>
               
            </div>
@endsection
