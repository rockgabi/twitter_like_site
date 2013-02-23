define(['backbone', 'tpl', '/js/app-definition.js'], function(Backbone, tpl, App) {

	App.Views.ProfileView = Backbone.View.extend({
		tagName: 'section',

		id: 'profile',

		events: {

		},

		placeholder: undefined,


		/**
		 * Initialize the profile view
		 * @return undefined
		 */
		initialize: function(e) {
			this.template = _.template(tpl.get('profile'));
			this.placeholder = e.placeholder;
			if ((typeof e.placeholder) !== 'undefined') {
				this.placeholder = e.placeholder;
			} else {
				this.placeholder = '#main-content';
			}

			$(this.placeholder).html('<div class="ajax-loading">&nbsp;</div>')

		},

		/**
		 * Renders the profile
		 * @param  {Event} e
		 * @return {ProfileView}
		 */
		render: function(e) {
			// Perfom AJAX request for current profile at the profile service URL
			// Render the data response by templating it
			$.ajax({ 
				url: App.Connector.Services.profile,
				type: 'GET',
				dataType: 'json',
				context: this,
				success: function(d) {
					// Replace at the placeholder if defined
					$(this.placeholder).html(this.template(d));
				}
			})
			

			return this;
		}
	});

	

});