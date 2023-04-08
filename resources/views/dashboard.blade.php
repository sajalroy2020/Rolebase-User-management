@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Admin Dashboard</h2>
        <hr>
        <div class="card p-3 w-25 shadow text-center">
            <h3 class="text-danger"><b>{{count($all_data)}}</b></h3>
            <h3>All User</h3>
        </div>


        <div class="mt-4">
            <button class="btn btn-warning">
                <a class="text-black" style="text-decoration: none" href="{{url('/addUser')}}">Add User</a>
            </button>
        </div>
        <table class="table mt-4">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
            @foreach($all_data as $key => $data)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        <button class="btn btn-warning text-black">
                            <a style="text-decoration: none" href="{{url('/userDetails', $data->id)}}">View</a>
                        </button>
                        <button class="btn btn-info">
                            <a class="text-black" style="text-decoration: none" href="{{url('/userDetails', $data->id)}}">Edit</a>
                        </button>
                        <button class="btn btn-danger">
                            <a class="text-black" style="text-decoration: none" href="{{url('/userDetails', $data->id)}}">Delete</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
