@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-info">Admin Message</h2>
            </div>
            <br>
            <div class="row">
                <br><br>
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle fa-lg me-2"></i> <strong>{{ session('success') }}!</strong>
                            {{-- You should check in on some of those fields below. --}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">All Message Data</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sn No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"> Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php($i=1)
                               
                        @foreach ($con_message as $msg)
                               <tr>
                                <td>{{ $i++ }}</td> 
                                {{-- <td scope="row ">{{$brands->firstItem()+$loop->index }}</td> --}}
                                <td>{{ $msg->name }}</td>
                                <td>{{$msg->email }}</td>
                                <td>{{$msg->subject }}</td>
                                <td>{{$msg->message }}</td>
                              @if ($msg->created_at == null)
                              <td>
                                <spap class="text-danger">No Data Set</span>  
                              </td>
                            @else
                        {{-- <td>{{ $msg->created_at->diffForHumans()}}</td> --}}
                   <td>{{ Carbon\Carbon::parse($msg->created_at)->diffForHumans()}}</td>
                             @endif
                             <th><a href="{{ url('/delete/contact/'.$msg->id) }}" class="btn btn-danger">Delete</a></th>
                        </tr>
                        @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $slider->links() }} --}}
                    </div>
                </div>
               
            </div>
@endsection
