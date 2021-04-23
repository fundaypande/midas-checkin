<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/uikit.min.css') }}" />
    <script src="{{ url('js/uikit.min.js')}}"></script>
    <script src="{{ url('js/uikit-icons.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <title>Login</title>
    <style>
        .uk-tab>.uk-active>a {
            border-color: #f945b1 !important;
        }
    </style>
</head>
<body>

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
	<div class="uk-width-1-1">
		<div class="uk-container">
			<div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
				<div class="uk-width-1-1@m">

					<div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <div style="width: inherit;
                        text-align: center;
                        display: table-cell;">
                            <img style="width: 200px; margin: 0 auto; margin-top: 11px" src="{{ url('images/system/logo_600x393.png') }}" alt="">
                        </div>
                        <br>
						<ul class="uk-tab uk-flex-center" uk-grid uk-switcher="animation: uk-animation-fade">
							<li><a href="#">Log In</a></li>
							<li><a href="#">Sign Up</a></li>
							<li class="uk-hidden">Forgot Password?</li>
						</ul>
						<ul class="uk-switcher uk-margin">
                        <li>
								<h3 class="uk-card-title uk-text-center">Welcome back!</h3>
                                @if (session('warning'))
                                    <div class="uk-alert-warning" uk-alert>
                                        <a class="uk-alert-close" uk-close></a>
                                        {{ session('warning') }}
                                    </div>
                                @endif
								<form method="POST" action="{{ route('login') }}">
                                    @csrf
									<div class="uk-margin">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon" uk-icon="icon: mail"></span>
											<input id="email" type="email" name="email" class="uk-input uk-form-large" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                            <span style="color: #e65e5e" class="invalid-feedback">
                                                    <p>{{ $errors->first('email') }}</p>
                                                </span>
                                            @endif
                                        </div>
									</div>
									<div class="uk-margin">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon" uk-icon="icon: lock"></span>
											<input id="password" name="password" class="uk-input uk-form-large" type="password" placeholder="Password" required>
                                            @if ($errors->has('password'))
                                                <span style="color: #e65e5e" class="invalid-feedback">
                                                    <p>{{ $errors->first('password') }}</p>
                                                </span>
                                            @endif
                                        </div>
									</div>
                                    <div class="columns">
                                        <div class="column">
                                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                                <label>
                                                    <input class="uk-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="uk-margin uk-text-right@s uk-text-center uk-text-small">
                                                <a href="{{ url('/password/reset') }}">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>



									<div class="uk-margin">
										<button style="margin-top: -40px; background-color: #f945b1 !important" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Login') }}</button>
									</div>
                                    <div class="columns is-mobile">
                                        {{-- <div class="column"><hr></div>
                                        <div class="column uk-text-center is-two-fifths" style="padding: 23px 0;"><p>One Tap Login</p></div>
                                        <div class="column"><hr></div> --}}
                                    </div>

                                    <div class="columns is-mobile" style="margin-top: -40px;">
                                        {{-- <div class="column">
                                            <a href="{{ url('/auth/google') }}" class="uk-button uk-button-default" style="width: 100%;">
                                                <span class="icon">
                                                    <i style="margin-top: 10px;"></i>
                                                    <img src="{{ url('/icon/google.svg') }}" alt="">
                                                </span>
                                                <span>Google</span>
                                            </a>
                                        </div> --}}
                                        {{-- <div class="column">
                                            <a href="{{ url('/auth/facebook') }}" class="uk-button uk-button-primary" style="width: 100%;">
                                                <span uk-icon="facebook" class="icon">
                                                    <i style="margin-top: 10px;"></i>
                                                </span>
                                                <span>Facebook</span>
                                            </a>
                                        </div> --}}
                                    </div>
                                    <br>
									<div class="uk-text-small uk-text-center">
										Not registered? <a href="#" uk-switcher-item="1">Create an account</a>
									</div>
								</form>
							</li>
							<li>
								<h3 class="uk-card-title uk-text-center">Sign up today. It's free!</h3>
                                <br>
								<form method="POST" action="{{ route('register') }}">
                                    @csrf
									<div class="uk-margin">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon" uk-icon="icon: user"></span>
											<input type="text" class="uk-input uk-form-large" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="First and last name">
                                            @error('name')
                                                <span style="color: #e65e5e" class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
									</div>
									<div class="uk-margin">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon" uk-icon="icon: mail"></span>
											<input class="uk-input uk-form-large" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                                            @error('email')
                                                <span style="color: #e65e5e" class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
									</div>
									<div class="uk-margin">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon" uk-icon="icon: lock"></span>
											<input class="uk-input uk-form-large" type="password" placeholder="Set a password" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span style="color: #e65e5e" class="invalid-feedback" role="alert">
                                                    <p>{{ $message }}</p>
                                                </span>
                                            @enderror
                                        </div>
									</div>
									<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
										<label><input class="uk-checkbox" required type="checkbox"> I agree the Terms and Conditions.</label>
									</div>
									<div class="uk-margin">
										<button style="margin-top: -10px; background-color: #f945b1 !important" class="uk-button uk-button-primary uk-button-large uk-width-1-1">Sign Up</button>
									</div>

                                    {{-- <div class="columns is-mobile">
                                        <div class="column"><hr></div>
                                        <div class="column uk-text-center is-two-fifths" style="padding: 23px 0;"><p>One Tap Sign Up</p></div>
                                        <div class="column"><hr></div>
                                    </div> --}}

                                    {{-- <div class="columns is-mobile" style="margin-top: -40px;">
                                        <div class="column">
                                            <a href="{{ url('/auth/google') }}" class="uk-button uk-button-default" style="width: 100%;">
                                                <span class="icon">
                                                    <i style="margin-top: 10px;"></i>
                                                    <img src="{{ url('/icon/google.svg') }}" alt="">
                                                </span>
                                                <span>Google</span>
                                            </a>
                                        </div>
                                        <div class="column">
                                            <a href="{{ url('/auth/facebook') }}" class="uk-button uk-button-primary" style="width: 100%;">
                                                <span uk-icon="facebook" class="icon">
                                                    <i style="margin-top: 10px;"></i>
                                                </span>
                                                <span>Facebook</span>
                                            </a>
                                        </div>
                                    </div> --}}

									<div class="uk-text-small uk-text-center">
										Already have an account? <a href="#" uk-switcher-item="0">Log in</a>
									</div>
								</form>
							</li>

							<li>
								<h3 class="uk-card-title uk-text-center">Forgot your password?</h3>
								<p class="uk-text-center uk-width-medium@s uk-margin-auto">Enter your email address and we will send you a link to reset your password.</p>
								<form>
									<div class="uk-margin">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon" uk-icon="icon: mail"></span>
											<input class="uk-input uk-form-large" type="text" placeholder="Email address">
										</div>
									</div>
									<div class="uk-margin">
										<button class="uk-button uk-button-primary uk-button-large uk-width-1-1">Send Email</button>
									</div>
									<div class="uk-text-small uk-text-center">
										<a href="#" uk-switcher-item="1">Back to login</a>
									</div>
                                </form>

							</li>
                        </ul>

                    </div>
                    <p style="text-align: center;
                    color: #a2a2a2;
                    font-size: 12px;">Version 1.1.1</p>
                    <p style="text-align: center;
                    color: #a2a2a2;
                    font-size: 12px;">Developed by. <a href="https://funware.co.id">funware.co.id</a></p>
				</div>
			</div>
		</div>
	</div>
</div>


</body>
</html>
