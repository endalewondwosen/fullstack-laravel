
@extends('admin.admin_master')
@section('admin')
<div class="col-md-12">
    <a href="{{ route('all.about') }}" style="padding:10px" ><button class="btn btn-info">Back to all About</button></a>
<br><br>
    <div class="card">
        <div class="card-header"> All About </div>
        <div class="card-body">
            <form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
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
                    <label class="form-label">Long Description</label>
                    <textarea name="long_desc" id="" cols="30" rows="3" class="form-control" placeholder=""></textarea>          
                    @error('long_desc')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top : 15px">Add
                    About</button>
            </form>
        </div>
    </div>
</div>
@endsection