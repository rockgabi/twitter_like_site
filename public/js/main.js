
/* Dependency injection */
require(['backbone', 'tpl', '/js/app-definition.js', '/js/views/ResourcesView.js',
	'/js/views/AddResourceView.js'],
 function(Backbone, tpl, App, undefined, undefined) {
	
	// template() helper function definition
	App.Helpers.template = function(id) {
		return _.template($('#' + id).html());
	};


	/* Models */
	App.Models.Resource = Backbone.Model.extend({
		urlRoot: '/resources',

		defaults: {
			'id' : null,
			'time' : '',
			'resource' : '',
			'user_id' : null
		},

		validate: function(attrs) {
			if (attrs.resource === '') {
				return 'A resource must have a content *resource attribue*';
			}
		}
	});

	/* Collections */
	App.Collections.Resources = Backbone.Collection.extend({
		
		model: App.Models.Resource,

		url: '/resources',

		initialize: function() {
			this.bind('add', this.addResource, this);
		},

		addResource: function(e) {
			e.save(null, {
				success: function() {
					
				}
			});
		}

	});

	
	/* Views */
	



	tpl.loadTemplates(['single-resource'], function() {
		new App.Router();
		Backbone.history.start();
		c = new App.Collections.Resources({ });
		c.on('error', function(m,e){ console.log(e); })
		c.reset();
		
		cv = new App.Views.ResourcesView({ collection: c });
		c.fetch();

		// Vista del nuevo recursos, se pasa como parametro la colección
		// para que pueda actualizarla
		ar = new App.Views.AddResourceView({ collection: c });

		//v.render();
	});

	

});












