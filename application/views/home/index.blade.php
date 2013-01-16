@layout('layouts.common')

@section('title')
	@parent
	Home
@endsection

@section('scripts')
	<script data-main= "/js/config.js" src="/js/vendor/requirejs-2.1.2.js"></script>
@endsection

@section('styles')
	@parent
	{{ Asset::styles() }}
@endsection

@section('right-bar')
	<h3>Bienvenido {{ Auth::user()->username }}</h3>
	<p>{{ HTML::link('logout', __('forms.button_logout')) }}</p>
	<p>{{ HTML::link('profile', __('common.title_profile')) }}</p>
@endsection

@section('content')
	<section id="main-content">
		
	</section>	<!-- Fin #main-content -->

	<section id="resources" class="wrapped">
	        
	</section>  <!-- Fin #resources -->
@endsection