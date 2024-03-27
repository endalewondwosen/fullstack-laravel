@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-info">Admin Contact</h2>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('add.contact') }}">
                        <button class="btn btn-info">Add Contact</button>
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> All Contact </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sn No</th>
                                    
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col"> Adress</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php($i=1)
                               
                        @foreach ($contacts as $contact)
                               <tr>
                                <td>{{ $i++ }}</td> 
                                {{-- <td scope="row ">{{$brands->firstItem()+$loop->index }}</td> --}}
                                <td>{{ $contact->email }}</td>
                                <td>{{$contact->phone }}</td>
                                <td>{{$contact->address }}</td>
                              @if ($contact->created_at == null)
                              <td>
                                <spap class="text-danger">No Data Set</span>  
                              </td>
                            @else
                        <td>{{ $contact->created_at->diffForHumans()}}</td>
                   {{-- <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}}</td> --}}
                             @endif
                             <th><a href="{{ url('/edit/contact/'.$contact->id) }}" class="btn btn-info">Edit</a></th>
                             <th><a href="{{ url('/delete/contact/'.$contact->id) }}" class="btn btn-danger">Delete</a></th>
                        </tr>
                        @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $slider->links() }} --}}
                    </div>
                </div>
               
            </div>
@endsection
