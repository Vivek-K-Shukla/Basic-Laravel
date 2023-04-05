@extends('layouts.main')
@section('main-container')
<div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-md-6">
            @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                <div class="card">
        <div class="card-header">
            <h2>Member Profile Update</h2>
            <a href="{{url('/dashboard')}}" class="btn btn-primary btn-sm float-end">Back</a>
        </div>
        <div class="card-body">
            <!-- <form action="{{url('update/'.$members->id)}}" method="POST" enctype="multipart/form-data"> -->
            <form action="/update-user" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$members['id']}}">
                <div class="form-group mb-3">
                    <label for="">Name:</label>
                    <input type="text" name="name" value="{{$members['name']}}" placeholder="Enter Your Name" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email:</label>
                    <input type="text" name="email"  value="{{$members['email']}}" placeholder="Enter Your Email" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Image:</label>
                    <input type="file" name="image" value="{{$members['image']}}"  placeholder="Enter Your Image" class="form-control">
                    <img src="{{asset('public/img/'.$members['image'])}}" width="70px" height="70px" alt="Image">
                </div>
                <div class="form-group">
                        <label for="message">Message:</label>
                        <input type="text" name="message"  value="{{$members['message']}}" class="form-control" placeholder="Enter Message">
                        <span class="text-danger">@error('message'){{$message}}@enderror</span>
                    </div>
                <div class="form-group mb-3"></div>
                <button type="submit" class="btn btn-primary btn btn-inline">UPDATE MEMBER</button>
                </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection