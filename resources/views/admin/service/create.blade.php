
@extends('admin.admin_master')
@section('admin')
<a href="{{ route('all.service') }}"><button class="btn btn-info">Back to all service</button></a>
<div class="col-md-12">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle fa-lg me-2"></i> <strong>{{ session('success') }}!</strong>
        {{-- You should check in on some of those fields below. --}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="card">
        <div class="card-header"> All Service </div>
        <div class="card-body">
            <form action="{{ route('store.service') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label"> Title</label>
                    <input type="text" name="title" class="form-control" placeholder="">
                    @error('title')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">short Description</label>
                    <textarea name="short_desc" id="" cols="30" rows="3" class="form-control" placeholder=""></textarea>          
                    @error('short_desc')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Service Image</label>
                    <input type="file" name="image" class="form-control" placeholder="">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top : 15px">Add
                    Service</button>
            </form>
        </div>
    </div>
</div>
@endsection