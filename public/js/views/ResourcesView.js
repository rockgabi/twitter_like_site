define(['backbone', 'tpl', '/js/app-definition.js'], function(Backbone, tpl, App) {

	App.Views.ResourcesItemView = Backbone.View.extend({
			tagName: 'li',

			className: 'resource',

			events: {
				
				

			},

			initialize: function() {
				this.model.bind('change', this.render, this);
				this.template = _.template(tpl.get('single-resource'));
			},

			render: function(e) {
				$(this.el).html(this.template(this.model.toJSON()));
				return this;
			},

			deleteResource: function(e) {
				this.model.destroy();
			}

		});

	App.Views.ResourcesView = Backbone.View.extend({
		tagName: 'ul',

		className: 'resource-list',

		initialize: function() {
			this.collection.bind('reset', this.render, this);
			this.collection.bind('add', this.addResource, this);
			//this.collection.bind('destroy', this.removeResource, this);
		},

		events: {
			'click .delete': 'removeResource' 
		},

		render: function(e,f) {
			//console.log(e,f.success);
			$(this.el).html('');
			_.each(this.collection.models, function(resource) {
				$(this.el).append( new App.Views.ResourcesItemView({ model: resource }).render().el);
			}, this);
			$('#resources').html(this.el);
			this.delegateEvents(); // Vuelvo a redelegar los eventos, sino se pierden
		},

		addResource: function(e,f) {
			// console.log(e,f);
			var resource = e;
			this.$el.prepend( new App.Views.ResourcesItemView({ model: resource }).render().el);
		},

		removeResource: function(e) {
			var $target = $(e.target),
				id = $target.data('id');
			$target = $target.parent('.resource');
			$target.remove();
			this.collection.get(id).destroy();

		}
	});
	return App;
});