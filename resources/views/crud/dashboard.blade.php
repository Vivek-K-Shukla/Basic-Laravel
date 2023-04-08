@extends('layouts.main')
@section('main-container')

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
                   @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
            <div class="card">
                <div class="card-header">
                    <h4>Member Profile Info</h4>
</h4>
</div>
<a href="{{url('/adduser')}}" class="btn btn-primary btn-sm float-end mb-2">Add Member</a><br>
<div class="card-body">
    <table class="table table-borderd table-striped">
            @if(count(@$members) === 0)                   
            <div class="alert alert-danger">Sorry, No Record Found!</div>                       
            @else
            @foreach($members as $member)
        <thbody>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Messages</th>
                <th>Image</th>
                <th>Operations</th>
            </tr>  
            <tr>
                <td>{{$member['id']}}</td>
                <td>{{$member['name']}}</td>
                <td>{{$member['email']}}</td>
                <td>{{$member['password']}}</td>
                <td>{!! $member['message'] !!}</td>
                <!-- <td>{{$member['image']}}</td> -->
                <td><img src="{{asset('public/img/'.$member['image'])}}" width="70px" height="70px" alt="Image"></td>
                <td><button class="btn btn-success"><a href="{{'edit/'.$member['id']}}">EDIT</a></button><br><br>
                <button class="btn btn-danger"><a href="{{'delete/'.$member['id']}}">DELETE</a></button></td>
            </tr> 
            </thbody>
            @endforeach
            @endif
            </table>
</div>
</div>
</div>
</div>
</div>
@endsection