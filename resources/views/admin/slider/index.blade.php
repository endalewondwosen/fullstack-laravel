@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-info">Home Slider</h2>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('add.slider') }}">
                        <button class="btn btn-info">Add Slider</button>
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle fa-lg me-2"></i> <strong>{{ session('success') }}!</strong>
                            {{-- You should check in on some of those fields below. --}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header"> All Slider </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sn No</th>
                                    <th scope="col">Slider Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)

                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        {{-- <td scope="row ">{{$brands->firstItem()+$loop->index }}</td> --}}
                                        <td>{{ $slider->title }}</td>
                                        <td> <img src="{{ asset($slider->image) }}" alt=""
                                                style="height:40px,width:10px"></td>
                                        <td>{{ $slider->description }}</td>
                                        <td>{{ $slider->created_at->diffForHumans() }}</td>
                                        <td><a href="{{ url('/slider/edit/' . $slider->id) }}" class="btn btn-info">Edit</a>
                                        </td>
                                        <td><a href="{{ url('/slider/delete/' . $slider->id) }}"
                                                class="btn btn-danger">Delete</a></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $slider->links() }} --}}
                    </div>
                </div>

            </div>
        @endsection
