@extends('frontend.master.logintmp')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
            <div class="page-wrapper--contact">
                <div class="title-block">
                    <h3 class="title--popup txt-black">sign in your account to have access to different features</h3>
                    @include('admin.info')
                    @include('admin.errors')
                </div>
                <form id="login-form" action="{{ route('login') }}"  aria-label="{{ __('Login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fancyUsername" class="fancy-form-label">{{ __('E-Mail Address') }}</label>
                        <input id="fancyUsername" type="text" class="form-control form-control--fancy name {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" placeholder="eg: james_smith" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="fancyPass" class="fancy-form-label">{{ __('Password') }}</label>
                        <input type="password" id="fancyPass" class="form-control form-control--fancy password {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="type password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <label for="remember" class="remember-popup">
                        <input type="checkbox" id="remember" class="checkbox--fancy" {{ old('remember') ? 'checked' : '' }} name="checkbox">
                        {{ __('Remember Me') }}</label>

                    <button class="btn btn--round btn--md btn--black" type="submit">  {{ __('Login') }} </button>
                     &nbsp;&nbsp;
                    <a class="btn btn--round btn--md btn--black" href="{{route('register')}}">{{ __('register') }} </a>
                </form>

                <a href="{{ route('password.request') }}" class="auth_link"> {{ __('Forgot Your Password?') }}</a>
            </div>
        </div>
    </div>

@endsection
