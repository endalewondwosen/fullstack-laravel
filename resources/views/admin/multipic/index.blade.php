@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-info"> Home Portfolio</h2>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('add.potfolio') }}">
                        <button class="btn btn-info">Add Portfolio</button>
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
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">Add Portfolio</button>
                    </div>
                @endif
                
                    <div class="card-group">
                       @foreach ($images as $multi_image)
                           <div class="col-md-3 m-2">
                                <div class="card">
                                   <img src="{{ asset($multi_image->image) }}" alt="" >
                                </div>
                           </div>
                       @endforeach
                    </div>
                </div>
                
            </div>
@endsection
