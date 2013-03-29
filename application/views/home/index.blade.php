@layout('layouts.common')

@section('title')
	@parent
	Home
@endsection

@section('scripts')
	<script type="text/javascript">
	// Application Connector with Backend
		var bhConnector = <?php echo json_encode($connector); ?>;
		var user_id = <?php echo Auth::user()->attributes['id']; ?>;
	</script>

	<script data-main= "/js/config.js" src="/js/vendor/requirejs-2.1.2.js"></script>
	
@endsection

@section('styles')
	@parent
	{{ Asset::styles() }}
@endsection

@section('right-bar')
	<h3>Bienvenido {{ Auth::user()->username }}</h3>
	<p>{{ HTML::link('logout', __('forms.button_logout')) }}</p>
@endsection

@section('content')

	<section id="main-content">
		
	</section>	<!-- Fin #main-content -->

	<section id="resources">
	        
	</section>  <!-- Fin #resources -->
@endsection

@section('sidebar')
	<nav id="navigation" class="sidebar-item">
		<div class="nav-item">
			{{ HTML::link('#', 'Go home') }}
		</div> <!-- Fin .nav-item -->
		
		<div class="nav-item">
			{{ HTML::link('#profile', 'Access your profile') }}
		</div> <!-- Fin .nav-item -->

		<div class="nav-item">
			{{ HTML::link('#friends', 'Friends management') }}
		</div> <!-- Fin .nav-item -->

	</nav>	<!-- Fin #navigation -->
@endsection