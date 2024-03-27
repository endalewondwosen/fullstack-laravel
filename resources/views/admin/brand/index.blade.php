@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle fa-lg me-2"></i> <strong>{{ session('success') }}!</strong>
                            {{-- You should check in on some of those fields below. --}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header"> All Brand </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sn No</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand_image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php($i=1)
                               
                        @foreach ($brands as $brand)
                               <tr>
                                <td>{{ $i++ }}</td> 
                                {{-- <td scope="row ">{{$brands->firstItem()+$loop->index }}</td> --}}
                                <td>{{$brand->brand_name }}</td>
                                <td><img src="{{ asset($brand->brand_image) }}" style="height:40px,width:70px" ></td>
                              @if ($brand->created_at == null)
                              <td>
                                <spap class="text-danger">No Data Set</span>  
                              </td>
                            @else
                        <td>{{ $brand->created_at->diffForHumans()}}</td>
                   {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td> --}}
                             @endif
                             <th><a href="{{ url('/brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a></th>
                             <th><a href="{{ url('/brand/delete/'.$brand->id) }}" class="btn btn-danger">Delete</a></th>
                        </tr>
                        @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $brands->links() }} --}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> All Brand </div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" placeholder="">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }} !</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" placeholder="">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top : 15px">Add
                                    Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
