
/* Dependency injection */
require(['backbone', 'tpl', '/js/app-definition.js', '/js/models.js', '/js/views/ResourcesView.js',
	'/js/views/AddResourceView.js', '/js/views/profileView.js', '/js/views/FriendsView.js', '/js/views/SearchFriendsView.js'],
	function(Backbone, tpl, App, undefined, undefined, undefined, undefined, undefined, undefined) {

		// template() helper function definition
		App.Helpers.template = function(id) {
			return _.template($('#' + id).html());
		};

		/*=============================================
		Application starts here
		=============================================*/

		tpl.loadTemplates(['single-resource', 'add-resource', 'profile', 'single-friend', 'find-friend'], function() {
			new App.Router();
			Backbone.history.start();
			
			do_styling();

		});

		/*==========  Javascript for styling at startup  ==========*/
		function do_styling() {
			var h = $(window).height(),
				w = $(window).width(),
				constWrapperWidth = 900,
			// Accomodate this when styling changes
			sidebarHeight = h - 91 - 20,
			leftPosition = (w - constWrapperWidth) / 2 + constWrapperWidth - 290;
			$('#sidebar').css({ height: sidebarHeight, left: leftPosition });
			$('#overlay').css({ height: h - 51 });
		}

});












