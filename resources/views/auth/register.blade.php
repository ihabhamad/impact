@extends('frontend.master.logintmp')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
            <div class="page-wrapper--contact">
                <div class="title-block">
                    <h3 class="title--popup txt-black">sign in your account to have access to different features</h3>
                </div>
                <form id="login-form" action="{{ route('register') }}"  aria-label="{{ __('Register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fancyUsername" class="fancy-form-label">{{ __('Name') }}</label>
                        <input id="fancyUsername" type="text" class="form-control form-control--fancy name {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" name="name" placeholder="eg: james_smith" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="fancyUsername" class="fancy-form-label">{{ __('E-Mail Address') }}</label>
                        <input id="fancyUsername" type="text" class="form-control form-control--fancy name {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" placeholder="eg: james_smith@example.com" required autofocus>
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
                    <div class="form-group">
                        <label for="fancyPass" class="fancy-form-label">{{ __('Confirm Password') }}</label>
                        <input type="password" id="fancyPass" class="form-control form-control--fancy password {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="confirm password" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>



                    <button class="btn btn--round btn--md btn--black" type="submit">   {{ __('Register') }} </button>

                </form>

            </div>
        </div>
    </div>

@endsection