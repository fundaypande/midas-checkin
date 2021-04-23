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
    <title>Reset Your Password</title>
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
						<ul class="uk-tab uk-flex-center" uk-grid uk-switcher="animation: uk-animation-fade">
							<li>Reset Your Password</li>
						</ul>
						<ul class="uk-switcher uk-margin">
							<li>
                                @if (session('warning'))
                                    <div class="uk-alert-warning" uk-alert>
                                        <a class="uk-alert-close" uk-close></a>
                                        {{ session('warning') }}
                                    </div>
                                @endif
								<h3 class="uk-card-title uk-text-center">Reset Your Password</h3>
								<p class="uk-text-center uk-width-medium@s uk-margin-auto">Enter your email address and generate new password.</p>
                                @if (session('status'))
                                    <div class="uk-alert-success" uk-alert>
                                        <a class="uk-alert-close" uk-close></a>
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ url('/reset_password_with_token') }}">
                                    @csrf
									<div class="uk-margin">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon" uk-icon="icon: mail"></span>
											<input class="uk-input uk-form-large" type="email" placeholder="Email address" name="email" value="{{ old('email') }}" required autofocus>
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
											<input class="uk-input uk-form-large" type="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
                                            @if ($errors->has('password'))
                                                <span style="color: #e65e5e" class="invalid-feedback">
                                                    <p>{{ $errors->first('password') }}</p>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="uk-margin">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon" uk-icon="icon: lock"></span>
											<input class="uk-input uk-form-large" id="password-confirm" type="password" placeholder="Password Confirmation" name="password_confirmation" value="{{ old('password') }}" autocomplete="new-password" required>
                                        </div>
                                    </div>

                                    <input type="hidden" name="token" value="{{ $token }}">

									<div class="uk-margin">
										<button style="background-color: #f945b1 !important" class="uk-button uk-button-primary uk-button-large uk-width-1-1">Reset Password</button>
									</div>
									<div class="uk-text-small uk-text-center">
										<a href="{{ url('/login') }}">Back to login</a>
									</div>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>


