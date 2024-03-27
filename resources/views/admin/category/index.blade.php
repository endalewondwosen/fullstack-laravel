@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> All Category </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sn No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td scope="row">{{ $categories->firstItem() + $loop->index }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        {{-- <td>{{$category->name }}</td> --}}
                                        <td>{{ $category->user->name }}</td>
                                        @if ($category->created_at == null)
                                            <td>
                                                <spap class="text-danger">No Data Set</span>
                                            </td>
                                        @else
                                            <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                                        @endif
                                        <th><a href="{{ url('/category/edit/' . $category->id) }}"
                                                class="btn btn-info">Edit</a></th>
                                        <th><a href="{{ url('/category/delete/' . $category->id) }}"
                                                class="btn btn-danger">Delete</a></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $categories->links() }} --}}
                        {{ $categories->links('pagination::bootstrap-5') }}
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> All Category </div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" placeholder="">

                                    @error('category_name')
                                        <div class="alert alert-danger">{{ $message }} !</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top : 15px">Add
                                    Category</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- all Trash Category --}}

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header"> All Trash Category </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sn No</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)

                                        @foreach ($trashCat as $category)
                                            <tr>
                                                <td scope="row">{{ $categories->firstItem() + $loop->index }}</td>
                                                <td>{{ $category->category_name }}</td>
                                                <td>{{ $category->name }}</td>
                                                @if ($category->created_at == null)
                                                    <td>
                                                        <spap class="text-danger">No Data Set</span>
                                                    </td>
                                                @else
                                                    <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                                    </td>
                                                @endif
                                                <th><a href="{{ url('/category/restore/' . $category->id) }}"
                                                        class="btn btn-info">Restore</a></th>
                                                <th><a href="{{ url('/category/Pdelete/' . $category->id) }}"
                                                        class="btn btn-danger">P Delete</a></th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $trashCat->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
