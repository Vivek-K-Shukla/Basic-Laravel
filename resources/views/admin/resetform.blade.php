@extends('layouts.main')
@section('main-container')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Reset Password</h4><hr>
                <form action="{{url('/resetsubmit')}}" method="POST">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Enter Registered Email Id:</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email">
                        <span class="text-danger" value="{{old('email')}}">@error('email'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password">Enter New Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" value="{{old('password')}}">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="password_confirmation">Confirm New Password:</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter password" value="{{old('password_confirmation')}}">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-block btn-primary" type="submit">Update Password</button>
                    </div>
                </form>
</div>
</div>
</div>
@endsection