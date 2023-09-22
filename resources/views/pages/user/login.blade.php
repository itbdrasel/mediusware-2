@extends('master')
@section('content')
    <div id="login">
        <h3 class="text-center text-info pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{url('/store')}}" method="post">
                            @csrf
                            <h3 class="text-center text-primary">Login</h3>
                            <div class=" mb-2">
                                <label for="email" class="col-form-label">E-mail:</label><br>
                                <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control @error('email') is-invalid @enderror">
                            </div>
                            <div class="mb-2">
                                <label for="password" class="col-form-label">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            </div>
                            <div class="mb-2">
                                @php
                                    $spinner=  '<i class="fas fa-spinner fa-pulse"></i> Please Wait';
                                @endphp
                                <button type="submit" onclick="this.disabled=true;this. innerHTML='{{$spinner}}';this.form.submit();" class="btn btn-primary">Login</button>&nbsp;&nbsp;
                            </div>
                            <div class="">
                                <a href="{{url('user/create')}}" class="text-primary">Register here</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection