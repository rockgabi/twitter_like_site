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

	App.Models.Friend = Backbone.Model.extend({
		urlRoot: App.Connector.Services.friends,

		defaults: {
			'id' : null,
			'related_started_at' : null,
			'user1_id' : '',
			'user2_id' : '',
			'type' : 'friend'
		},

		initialize: function() {
		}

	});

	App.Collections.Friends = Backbone.Collection.extend({
		model: App.Models.Friend,

		url: App.Connector.Services.friends,

		initialize: function(data) {
			// Url to get the friends collection for the current user (data.user_id)
			this.url = this.url + '/' + data.user_id;
		}

	});
});