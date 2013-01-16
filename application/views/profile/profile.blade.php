@layout('layouts.common')

@section('title')
	@parent
	{{ __('common.title_profile') }}
@endsection

@section('right-bar')

@endsection

@section('content')
	<section id="profile">
		<div id="profile-head">
			<p>Usuario: {{ $username }}</p>
			<p>Fecha de registro: {{ $created_at }}</p>
			<p>Recursos compartidos: {{ $resources_num }}</p>
		</div>	<!-- Fin #profile-head -->

	</section>	<!-- Fin #profile -->
@endsection