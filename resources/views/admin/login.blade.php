@extends('layouts.main')
@section('main-container')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Login</h4><hr>
                <form action="login-save" method="POST">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email"  value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password"  value="{{old('password')}}" class="form-control" placeholder="Enter password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-inline btn-primary" type="submit">Login</button>
                    </div><br>
                    <a href="register">New User!! Register Here</a>
                </form>
</div>
</div>
</div>
@endsection