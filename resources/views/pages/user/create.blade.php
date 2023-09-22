@extends('master')
@section('content')
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{url($bUrl.'/store')}}" method="post">
                            @csrf
                            <h3 class="text-center text-primary">Registration</h3>

                            <div class="mb-2">
                                <label for="name" class="col-form-label">Name<code>*</code></label>
                                <input type="text" id="name" name="name" value="{{ old('name')}} " class="form-control @error('name') is-invalid @enderror" >
                                <span id="name-error" class="error invalid-feedback">{{$errors->first('name')}}</span>
                            </div>
                            <div class="mb-2 ">
                                <label for="account_type" class="col-form-label">Account Type<code>*</code></label>
                                <select id="account_type" name="account_type" class="form-select @error('account_type') is-invalid @enderror">
                                    <option value="Individual">Individual</option>
                                    <option value="Business">Business</option>
                                </select>
                                <span id="name-error" class="error invalid-feedback">{{$errors->first('account_type')}}</span>
                            </div>

                            <div class="mb-2 ">
                                <label for="email" class="col-form-label">E-mail<code>*</code></label>
                                <input type="email" id="email" name="email" value="{{ old('email')}} " class="form-control @error('email') is-invalid @enderror" >
                                <span id="email-error" class="error invalid-feedback">{{$errors->first('email')}}</span>
                            </div>
                            <div class="mb-2">
                                <label for="password" class="col-form-label">Password<code>*</code></label>
                                <input type="password" id="password" name="password" value="" class="form-control @error('password') is-invalid @enderror" >
                                <span id="password-error" class="error invalid-feedback">{{$errors->first('password')}}</span>
                            </div>


                            <div class="mb-2">
                                @php
                                    $spinner=  '<i class="fas fa-spinner fa-pulse"></i> Please Wait';
                                @endphp
                                <button type="submit" onclick="this.disabled=true;this. innerHTML='{{$spinner}}';this.form.submit();" class="btn btn-primary">Registration</button>&nbsp;&nbsp;
                            </div>
                            <div class="">
                                <a href="{{url('/')}}" class="text-primary">Login here</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection