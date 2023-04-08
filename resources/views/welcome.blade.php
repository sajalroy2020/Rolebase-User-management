@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
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
                            <a href="{{url('/userDetails', $data->id)}}">See</a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </table>
    </div>
@endsection
