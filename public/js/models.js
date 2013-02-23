define(['backbone', '/js/app-definition.js'], function(Backbone, App) {
	App.Models.Resource = Backbone.Model.extend({
		urlRoot: App.Connector.Services.resources,

		defaults: {
			'id' : null,
			'time' : '',
			'resource' : '',
			'user_id' : null
		},

		validate: function(attrs) {
			if (attrs.resource === '') {
				console.log(attrs.resource);
				return 'A resource must have a content *resource attribute*';
			}
		}
	});

	/* Collections */
	App.Collections.Resources = Backbone.Collection.extend({
		
		model: App.Models.Resource,

		url: App.Connector.Services.resources,

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
});