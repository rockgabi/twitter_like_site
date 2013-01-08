@layout('layouts.common')

@section('title')
	@parent
	login
@endsection

@section('sidebar')
	<div id="login">
		{{ Form::open('account/login') }}
		
		{{ Form::token() }}
		<div class="generic-control">
			@if (Session::has('messages'))
				{{ (Session::get('messages')->first('_generics', '<p class="error-message">:message</p>')) }}
			@endif
			@if ($errors->has('_generics'))
				{{ $errors->first('_generics','<p class="error-message">:message</p>') }}
			@endif
		</div>	<!-- Fin .generic-control -->
		<!-- check for login erros flash var -->
		@if(Session::has('login_errors'))
			<p class="error">{{ __('forms.error_username_password') }}</span>
		@endif

		<!-- username field -->
		<div class="username-section">
			<p>{{ Form::label('username', __('forms.label_username')) }}</p>
			<p>{{ Form::text('username') }}</p>
			<div class="control">
				@if ($errors->has('username'))
					@foreach ($errors->get('username', '<p class="error-message">:message</p>') as $username_error)
						{{ $username_error }}
					@endforeach
				@endif
			</div>	<!-- Fin .control -->
		</div>	<!-- Fin .username-section -->

		<!-- password field -->
		<div class="password-section">
			<p>{{ Form::label('password', __('forms.label_password')) }}</p>
			<p>{{ Form::password('password') }}</p>
			<div class="control">
				@if ($errors->has('password'))
					@foreach ($errors->get('password', '<p class="error-message">:message</p>') as $password_error)
						{{ $password_error }}
					@endforeach
				@endif
			</div>	<!-- Fin .control -->
		</div>	<!-- Fin .password-section -->
		<!-- submit button -->
		<p>{{ Form::submit(__('forms.button_login')) }}</p>

		{{ Form::close() }}

		{{ HTML::link_to_route('register', __('forms.button_register'), array('id' => 'register')) }}
	</div>	<!-- Fin #login -->

@endsection