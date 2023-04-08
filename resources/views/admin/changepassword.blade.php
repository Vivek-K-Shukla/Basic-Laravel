@extends('layouts.main')
@section('main-container')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Chane Password</h4><hr>
                <form action="{{url('/changepassword-submit')}}" method="POST">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Enter Old Password:</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter Old Password" value="{{old('password')}}">
                        <span class="text-danger">@error('oldpassword'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="newpassword">Enter New Password:</label>
                        <input type="text" name="newpassword" class="form-control" placeholder="Enter New Password" value="{{old('newpassword')}}">
                        <span class="text-danger">@error('newpasword'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group mt-3">
                        <label for="newpasswordd_confirmation">Confirm New Password:</label>
                        <input type="text" name="newpassword_confirmation" class="form-control" placeholder="Confirm password" value="{{old('newpassword_confirmation')}}">
                        <span class="text-danger">@error('newpassword_comfirmation'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-block btn-primary" type="submit">Update Password</button>
                    </div>
                </form>
</div>
</div>
</div>
@endsection