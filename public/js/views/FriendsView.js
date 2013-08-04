define(['backbone', 'tpl', '/js/app-definition.js'], function(Backbone, tpl, App) {
	
	App.Views.FriendItemView = Backbone.View.extend({
		tagName: 'li',

		className: 'friend-item',

		events: {

		},

		initialize: function() {
			this.model.bind('change', this.render, this);
			this.template = _.template(tpl.get('single-friend'));
		},

		render: function() {
			// Renders the JSON representation using the template, into the 'el' defined by this view
			$(this.el).html(this.template(this.model.toJSON()));
			return this;
		},

		removeFriendship: function(e) {

		}

	})

	App.Views.FriendsView = Backbone.View.extend({
		tagName: 'ul',

		id: 'friends',

		initialize: function() {
			this.container = $('#main-content');
			this.container.html('<div class="ajax-loading">&nbsp;</div>');
			this.collection.bind('reset', this.render, this);
		},

		events: {
			'click .delete' : 'removeFriendship'
		},

		render: function() {
			$(this.el).html('');
			_.each(this.collection.models, function(friend) {
				// Create the View for the Friend element,
				var _fv = new App.Views.FriendItemView({ model : friend });
				// Obtain the html of the view, after parsing, use render()
				var _fvHtml = _fv.render().el;
				// Append the html into the 'el' defined by this view
				$(this.el).append(_fvHtml);
			}, this);
			// Now we show the generated 'el' into a DOM container
			this.preprocessHtml();
			$('.ajax-loading', this.container).remove();
			this.container.append(this.el);
			this.delegateEvents();
		},

		removeFriendship: function(e) {

		},

		preprocessHtml: function() {
			// Classing purpose information
			$('li', $(this.el)).last().addClass('last');
			$('li', $(this.el)).first().addClass('first');
		}
		
	})


});