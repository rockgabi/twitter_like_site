define(['backbone', 'tpl', '/js/app-definition.js'], function(Backbone, tpl, App) {

	App.Views.ProfileView = Backbone.View.extend({
		tagName: 'section',

		id: 'profile',

		events: {

		},

		/**
		 * Initialize the profile view
		 * @return undefined
		 */
		initialize: function() {
			this.template = _.template(tpl.get('profile'));
		},

		/**
		 * Renders the profile
		 * @param  {Event} e
		 * @return {ProfileView}
		 */
		render: function(e) {
			var fakeProfile = {
				name : 'Gabriel',
				reg_date : '27 Jun 2012',
				compartidos : 4
			}
			this.$el.html(this.template(fakeProfile));

			return this;
		}
	});

	

});