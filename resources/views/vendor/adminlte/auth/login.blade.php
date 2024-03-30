

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop


@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

    <style>
        body {
          background: linear-gradient(45deg, #1f1f1f, #a303a3);
        }
      </style>

@section('auth_body')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <div class="login-logo">
                    <a href="">
                        <img src="http://ablecareers.test/vendor/adminlte/dist/img/AbleCareersLogo.png" alt="AbleCareers Logo" height="50">
                        <b>Able</b>Careers
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
              <form action="{{ $login_url }}" method="post" class="signin-form"  action="{{ $login_url }} ">
                @csrf
                  <div class="form-group">
                      <input type="text" name="email"  class="login-input form-control @error('email') is-invalid @enderror"
                      value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
                      @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
                  </div>
{{-- password --}}
            <div class="form-group ">
              <input id="password-input" type="password"  name="password" class=" login-input form-control @error('password') is-invalid @enderror"
              placeholder="{{ __('adminlte::adminlte.password') }}">

              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="form-control btn btn-dark submit px-3">Sign In</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-light"> {{ __('adminlte::adminlte.remember_me') }}
                                  <input type="checkbox" checked name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>>
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="{{ $password_reset_url }}" style="color: hsl(291, 26%, 95%)">Forgot Password</a>
                               <p> <a href="{{ $register_url }}" style="color: hsl(291, 26%, 95%)">Register a new membership</a></p>
                            </div>
            </div>
            @section('auth_footer')
{{-- Password reset link --}}
@if($password_reset_url)
    <p class="my-0">
        <a href="{{ $password_reset_url }}">
            {{ __('adminlte::adminlte.i_forgot_my_password') }}
        </a>
    </p>
@endif

{{-- Register link --}}
@if($register_url)
    <p class="my-0">
        <a href="{{ $register_url }}">
            {{ __('adminlte::adminlte.register_a_new_membership') }}
        </a>
    </p>
@endif
@stop
          </form>

          </div>
            </div>
        </div>
    </div>

    <script src="http://ablecareers.test/vendor/jquery/jquery.min.js"></script>
    <script src="http://ablecareers.test/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</section>
