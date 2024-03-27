@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8"> 
                    <div class="card">
                        <div class="card-header"> Edi Slider </div>
                            <div class="card-body">
 
                                <form action="{{ url('/slider/update/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="old_image" hidden>
                                    <div class="form-group">
                                        <label class="form-label">Slider Title</label>
                                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control" placeholder="">
                                        @error('title')
                                            <span class="text-danger">{{ $message }} !</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label">Slider Description</label>
                                        <textarea name="description"  cols="30" rows="3" class="form-control" placeholder="">
                                            {{ $slider->description }}
                                        </textarea>          
                                        @error('description')
                                            <span class="text-danger">{{ $message }} !</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Slider Image</label>
                                        <input type="file" name="image"  class="form-control" placeholder="">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                    <div class="form-group">
                                        <img src="{{ asset($slider->image) }}" alt="">
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="margin-top : 15px">Add
                                        Slider</button>
                                </form>
                    </div>
                </div>
            </div>
            </div>
@endsection
