
/* Dependency injection */
require(['backbone', 'tpl', '/js/app-definition.js', '/js/models.js', '/js/views/ResourcesView.js',
	'/js/views/AddResourceView.js', '/js/views/profileView.js'],
 function(Backbone, tpl, App, undefined, undefined, undefined, undefined) {
	
	// template() helper function definition
	App.Helpers.template = function(id) {
		return _.template($('#' + id).html());
	};

	tpl.loadTemplates(['single-resource', 'add-resource', 'profile'], function() {
		new App.Router();
		Backbone.history.start();
		
	});

});












