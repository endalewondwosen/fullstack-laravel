@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8"> 
                    <div class="card">
                        <div class="card-header"> Edi Service </div>
                            <div class="card-body">
 
                                <form action="{{ url('/service/update/'.$service->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden"  name="old_image" value="{{ $service->image }}">
                                    <div class="form-group">
                                        <label class="form-label"> Title</label>
                                        <input type="text" name="title" value="{{ $service->title }}" class="form-control" placeholder="">
                                        @error('title')
                                            <span class="text-danger">{{ $message }} !</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label">Short Description</label>
                                        <textarea name="short_desc"  cols="30" rows="3" class="form-control" placeholder="">
                                            {{ $service->short_desc}}
                                        </textarea>          
                                        @error('short_desc')
                                            <span class="text-danger">{{ $message }} !</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="image" value="{{ $service->image }}" class="form-control" placeholder="">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset($service->image) }}" alt="" style="width:400px; height:200px">
                                     </div>        
                                    <button type="submit" class="btn btn-primary" style="margin-top : 15px">Update
                                        Service</button>
                                </form>
                    </div>
                </div>
            </div>
            </div>
@endsection
