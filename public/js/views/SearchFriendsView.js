define(['backbone', 'tpl', '/js/app-definition.js' ], function(Backbone, tpl, App) {

	App.Views.SearchFriendsView = Backbone.View.extend({
		el: '#main-content',

		/**
		 * Events description for this Search Friends View
		 * @type {Object}
		 */
		events: {

		},

		/**
		 * Initializes this view
		 * @return {undefined}
		 */
		initialize: function() {
			// Setting the template for later parsing..
			this.template = _.template(tpl.get('find-friend'));
			// Rendering the view once initialized
			this.render(true);
		},

		/**
		 * Renders the view into the DOM
		 * @return {SearchFriendsView} This instance
		 */
		render: function(first) {
			var friendList;
			// Is the first time that it runs render() ?
			if (first) {
				$('#main-content').append(this.template({}));
				return this;
			} else {
				// Rendering because a search has been performed
				friendList = $('#main-content #friends-search-results');
				friendList.html('<div class="ajax-loading">&nbsp;</div>');
			}
		}

	})
	
});