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
			'' 			: 'indexRoute',
			'profile' 	: 'profileRoute',
			'friends' 	: 'friendsRoute'
		},

		indexRoute: function() {
			
			c = new App.Collections.Resources({ });
			c.on('error', function(m,e) { console.log(e); });
			c.reset();

			cv = new App.Views.ResourcesView({ collection: c });

			c.fetch();

			// Vista del nuevo recurso, se pasa como parametro la colección
			// para que pueda actualizarla
			ar = new App.Views.AddResourceView({ collection: c });

		},

		profileRoute: function() {
			
			if (typeof cv !== 'undefined') {
				ar.remove();
				cv.remove();
				cv = undefined;
			}

			// Definiendo la vista de profile
			pv = new App.Views.ProfileView({
				// Propiedad propia para saber sobre que reemplaza esta vista. En esta variable se define el elemento del DOM a reemplazar utilizando notación de jQuery
				placeholder: '#main-content'
			});

			pv.render();
		},

		friendsRoute: function() {
			if (typeof cv !== 'undefined') {
				ar.remove();
				cv.remove();
				cv = undefined;
			}

			fc = new App.Collections.Friends({ user_id : user_id});
			fv = new App.Views.FriendsView({ collection : fc });
			fc.reset();

			fc.fetch();
			
		}
	});

	App.Constant = {
		'BASE_URL' : "<?php echo URL::base(); ?>"
	}

	return App;
});