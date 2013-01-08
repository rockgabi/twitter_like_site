define(['backbone'], function(Backbone){
	App = {
		Models : {},
		Views : {},
		Collections : {},
		Router : {},
		Helpers : {}
	}

	App.Router = Backbone.Router.extend({
		routes: {
			'' : 'index'
		},

		index: function() {
			console.log('This is the home.');
		}
	})

	return App;
});