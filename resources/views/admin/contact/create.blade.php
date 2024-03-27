
@extends('admin.admin_master')
@section('admin')
<div class="col-md-12">
    <a href="{{ route('admin.contact') }}" style="padding:10px" ><button class="btn btn-info">Back to Admin contact List</button></a>
    <br><br>
    <div class="card">
        <br><br>
        <div class="card-header"> Add Contact </div>
        <div class="card-body">
            <form action="{{ route('store.contact') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label"> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                    @error('email')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Phone Contact</label>
                    <input type="text" name="phone" class="form-control" placeholder="+251-955-454-5412">
                    @error('email')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">Contact Address</label>
                    <textarea  name="address" id="" cols="30" rows="3" class="form-control" placeholder="like Addis Abeba"></textarea>          
                    @error('address')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-primary" style="margin-top : 15px">Add
                    Contact</button>
            </form>
        </div>
    </div>
</div>
@endsection