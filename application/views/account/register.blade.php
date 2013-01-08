@layout('layouts.common')

@section('title')
	@parent
	registrarse
@endsection

@section('sidebar')
	<div id="registration">
		{{ Form::open('account/register') }}
		
		{{ Form::token() }}
		<div class="generic-control">
			@if (Session::has('messages'))
				{{ (Session::first('messages', '<p class="error-message">:message</p>')) }}
			@endif
			@if ($errors->has('_generics'))
				{{ $errors->first('_generics','<p class="error-message">:message</p>') }}
			@endif
		</div>	<!-- Fin .generic-control -->

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
			<p>{{ Form::label('password_repeat', __('forms.label_password_rep')) }}</p>
			<p>{{ Form::password('password_repeat') }}</p>
			<div class="control">
				@if ($errors->has('password_repeat'))
					@foreach ($errors->get('password_repeat', '<p class="error-message">:message</p>') as $password_repeat_error)
						{{ $password_repeat_error }}
					@endforeach
				@endif
			</div>	<!-- Fin .control -->
		</div>	<!-- Fin .password-section -->

		<p>{{ Form::submit(__('forms.button_register')) }}</p>

		{{ Form::close() }}
	</div>	<!-- Fin #registration -->
@endsection