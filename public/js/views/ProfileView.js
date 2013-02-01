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
		},

		/**
		 * Renders the profile
		 * @param  {Event} e
		 * @return {ProfileView}
		 */
		render: function(e) {
			var fakeProfile = {
				username : 'Gabriel',
				created_at : '27 Jun 2012',
				resources_num : 4
			};

			// Perfom AJAX request for current profile at the profile service URL
			// Render the data response by templating it
			$.ajax({ 
				url: App.Connector.Services.profile,
				type: 'GET',
				dataType: 'json',
				context: this,
				success: function(d) {
					// Replace at the placeholder if defined
					if ((typeof this.placeholder) !== 'undefined') {
						$(this.placeholder).html(this.template(d));
					} else {
						$('#main-content').html(this.template(d));
					}
				}
			})
			

			return this;
		}
	});

	

});