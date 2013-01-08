@layout('layouts.common')

@section('title')
	@parent
	Home
@endsection

@section('scripts')
	<script data-main= "/js/config.js" src="/js/vendor/requirejs-2.1.2.js"></script>
@endsection

@section('styles')
	{{ Asset::styles() }}
@endsection

@section('right-bar')
	<h3>Bienvenido {{ Auth::user()->username }}</h3>
	<p>{{ HTML::link('logout', __('forms.button_logout')) }}</p>
@endsection

@section('content')
	<section id="blackhole-input" class="wrapped">
	    <form action="" id="add-resource">
	        <fieldset>
	            <h3 class="title"><label for="new-resource">Agregar nuevo:</label></h3>
	            <textarea name="new-resource" id="new-resource" cols="100" rows="10"></textarea>
	        </fieldset>

	        <button id="send-resource">Enviar</button>
	    </form> <!-- Fin #add-resource -->
	</section>

	<section id="resources" class="wrapped">
	        
	</section>  <!-- Fin #resources -->
@endsection