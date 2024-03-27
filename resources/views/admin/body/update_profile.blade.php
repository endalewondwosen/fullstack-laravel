@extends('admin.admin_master')
@section('admin')

@extends('admin.admin_master')
@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update</h2>
    </div>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{-- <i class="fas fa-check-circle fa-lg me-2"></i>  --}}
          <strong>{{ session('success') }}!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="card-body">
        <form action ="{{ route('update.user.profile') }} "  method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">User Name </label>
                <input type="text" name="user_name" class="form-control" id="user_name" value="{{ Auth::user()->name }}">
            </div>
                @error('user_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            <div class="form-group">
                <label for="exampleFormControlEmail">User Email</label>
                <input type="email" name="user_email" class="form-control" id="user_email" value="{{ Auth::user()->email }}">
            </div>
                @error('user_email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            
            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Update Profile</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection
@endsection