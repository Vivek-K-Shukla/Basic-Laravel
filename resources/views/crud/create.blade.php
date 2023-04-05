@extends('layouts.main')
@section('main-container')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Add Student</h4><hr>
                <form action="{{url('user-save')}}" method="POST" enctype="multipart/form-data">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name">
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password"  value="{{old('password')}}" class="form-control" placeholder="Enter password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image"  value="{{old('image')}}" class="form-control" placeholder="Choose Your Image">
                        <span class="text-danger">@error('image'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <input type="text" name="message"  value="{{old('message')}}" class="form-control" placeholder="Enter Message">
                        <span class="text-danger">@error('message'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-inline btn-primary" type="submit">ADD</button>
                    </div><br>
                    <a href="/dashboard">BACK</a>
                </form>
</div>
</div>
</div>
@endsection