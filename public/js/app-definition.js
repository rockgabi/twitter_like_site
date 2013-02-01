define(['backbone'], function(Backbone){
	App = {
		Models : {},
		Views : {},
		Collections : {},
		Router : {},
		Helpers : {},
		Constant : {},
		Connector : bhConnector
	}

	App.Router = Backbone.Router.extend({
		routes: {
			'' : 'indexRoute',
			'profile' : 'profileRoute'
		},

		indexRoute: function() {
			console.log('This is the home.');
			c = new App.Collections.Resources({ });
			c.on('error', function(m,e) { console.log(e); });
			c.reset();

			cv = new App.Views.ResourcesView({ collection: c });
			c.fetch();

			// Vista del nuevo recursos, se pasa como parametro la colección
			// para que pueda actualizarla
			ar = new App.Views.AddResourceView({ collection: c });
		},

		profileRoute: function() {
			// Definiendo la vista de profile
			pv = new App.Views.ProfileView({
				// Propiedad propia para saber sobre que reemplaza esta vista. En esta variable se define el elemento del DOM a reemplazar utilizando notación de jQuery
				placeholder: '#main-content'
			});

			if (typeof cv !== 'undefined') {
				cv.remove();
				cv = undefined;
			}

			pv.render();
		}
	});

	App.Constant = {
		'BASE_URL' : "<?php echo URL::base(); ?>"
	}

	return App;
});