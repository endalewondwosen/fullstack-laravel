
@extends('admin.admin_master')
@section('admin')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"> Edit Contact </div>
        <div class="card-body">
            <form action ="{{ URL('/update/contact/'.$contact->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label"> Email</label>
                    <input type="email" name="email" value="{{ $contact->email }}" class="form-control" placeholder="example@gmail.com">
                    @error('email')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Phone Contact</label>
                    <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control" placeholder="+251-955-454-5412">
                    @error('email')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">Contact Address</label>
                    <textarea  name="address" id="" cols="30" rows="3" class="form-control" placeholder="like Addis Abeba">
                        {{ $contact->address }}
                    </textarea>          
                    @error('address')
                        <span class="text-danger">{{ $message }} !</span>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-primary" style="margin-top : 15px">Updated
                    Contact</button>
            </form>
        </div>
    </div>
</div>
@endsection