define(['backbone', 'tpl', '/js/app-definition.js'], function(Backbone, tpl, App) {
	App.Views.AddResourceView = Backbone.View.extend({
		el: '#main-content',

		/**
		 * Events description for this Add Resource View
		 * @type {Object}
		 */
		events: {
			'click #send-resource' : 'addResource',
			'focusin #new-resource' : 'focusInForm',
			'focusout #new-resource' : 'focusOutForm',
			'keypress #new-resource' : 'newResource_keypress'
		},

		/**
		 * Initilizes this view
		 * @return {undefined}
		 */
		initialize: function() {
			this.template = _.template(tpl.get('add-resource'));
			this.render();
		},

		/**
		 * Renders the view in the DOM
		 * @return {AddResourceView}
		 */
		render: function() {
			$('#main-content').html(this.template({}));
			//this.delegateEvents(); // Vuelvo a redelegar los eventos, sino se pierden
			return this;
		},

		/**
		 * Maneja el agregado de un nuevo recurso desde
		 * el formulario de agregado de recursos
		 */
		addResource: function(e) {
			e.preventDefault();
			var m = new App.Models.Resource({}),
				res = $('#new-resource').val();
			console.log(res);
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

		/**
		 * Effects for the form at focus in
		 * @param  {Event} e
		 * @return {undefined}
		 */
		focusInForm: function(e) {
			$('#overlay').addClass('active');
			$('#blackhole-input').addClass('active');
		},
		/**
		 * Effects for the form at focus out
		 * 
		 * @param  {Event} e
		 * @return {undefined}
		 */
		focusOutForm: function(e) {
			$('#overlay').removeClass('active');
			$('#blackhole-input').removeClass('active');
		},

		/**
		 * Handles the keypress under the #new-resource
		 * 
		 * @param  eventObject e Object with the event information - This may vary
		 * @return {[type]}   [description]
		 */
		newResource_keypress: function(e) {
			if (e.which === 13) {
				$('#send-resource').click();
				$('#new-resource').focusout();
			}
		},

		/**
		 * Reimplements the remove function from Backbone's, this is needed if you don't want to remove
		 * the this.$el wrapper completely, so you then add it again, you may want to do this when reusing
		 * this wrapper for other views.
		 * 
		 * @return undefined
		 */
		remove: function() {
			var parent = this.$el.parent();
			this.$el.remove();
			parent.prepend('<section id="main-content"></section>');
		}
	})
});