@extends('admin.admin_master')
@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Chang Password</h2>
    </div>
    <div class="card-body">
        <form action ="{{ route('password.update') }} "  method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Current Password</label>
                <input type="password" name="old_password" class="form-control" id="current_password" placeholder="Current password">
            </div>
                @error('old_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            <div class="form-group">
                <label for="exampleFormControlPassword">New Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
            </div>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            <div class="form-group">
                <label for="exampleFormControlPassword">confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="confirm_password" placeholder="confirm Password">
            </div>
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Save</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection