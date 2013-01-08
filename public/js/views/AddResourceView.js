define(['backbone', 'tpl', '/js/app-definition.js'], function(Backbone, tpl, App) {
	App.Views.AddResourceView = Backbone.View.extend({
		el: '#add-resource',

		events: {
			'click #send-resource' : 'addResource',
			'focusin #new-resource' : 'focusInForm',
			'focusout #new-resource' : 'focusOutForm'
		},

		initialize: function() {
			//console.log('Inicializado');
		},

		addResource: function(e) {
			var m = new App.Models.Resource({}),
				res = $('#new-resource').val();
			e.preventDefault();
			var date = new Date();
			// Para logging de errores:
			m.on('error', function(e,c) { console.log(e.toJSON(),c); });

			$('#new-resource').val('');
			if (m.set({ user_id: 1, resource: res, time: (new Date(date.valueOf() - date.getTimezoneOffset() * 60000)) })) {
				// console.log(m); return;
				this.collection.add(m);
				return this;
			} else {
				return false;
			}
			
		},

		focusInForm: function(e) {
			$('#overlay').addClass('active');
			$('#blackhole-input').addClass('active');
		},

		focusOutForm: function(e) {
			$('#overlay').removeClass('active');
			$('#blackhole-input').removeClass('active');
		}
	})
});