@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8"> 
                    <div class="card">
                        <div class="card-header"> Edi Category </div>
                            <div class="card-body">
 
                        <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label  class="form-label">Update Category Name</label>
                                <input type="text" name="category_name" value="{{ $categories->category_name }}" class="form-control"  placeholder="">
                                @error('category_name')
                                    <div class="alert alert-danger">{{ $message }} !</div>
                                @enderror
                            </div>
                             <button type="submit" class="btn btn-primary" style="margin-top : 15px">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
@endsection
