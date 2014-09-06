jQuery(document).ready(function() {
	accordions = jQuery(".flavour-options-section");
	accordions.removeClass('flavour-options-section--nojs');

	accordions.each(function() {
		new Accordion(jQuery(this));
	});

	shortcode_init();
});


function Accordion(acc) {
	this.accordion = acc;
	this.accordionTrigger = acc.find('.flavour-options-section-title');
	this.active = false;
	this.accordionTrigger.on('click', {"self": this}, this.toggle);
}
Accordion.prototype.toggle = function(e) {
	var self = e.data.self;
	if(self.active) {
		self.accordion.removeClass('flavour-options-section--active');
	} else {
		self.accordion.addClass('flavour-options-section--active');
	}
	self.active = !self.active;
}



function shortcode_init() {
	tinymce.create('tinymce.plugins.flavour_shortcodes', {
	     init : function(ed, url) {
	             // Register command for when button is clicked
	             ed.addCommand('flavour_shortcodes_click', function() {
	             	tinymce.activeEditor.windowManager.open({
	             		url: url+'/shortcodes.html',
	             		width: Math.min(600, (jQuery(window).width()*0.8))+'px',
	             		height: Math.min(500, (jQuery(window).height()*0.8))+'px',
	             		title: 'Which Shortcode?'
	             	});
	             });

	         // Register buttons - trigger above command when clicked
	         ed.addButton('flavour_shortcodes', {title : 'Insert shortcode', cmd : 'flavour_shortcodes_click', image: url + '/assets/shortcode_icon.png' });
	     },   
	 });

	 // Register our TinyMCE plugin
	 // first parameter is the button ID1
	 // second parameter must match the first parameter of the tinymce.create() function above
	 tinymce.PluginManager.add('flavour_shortcodes', tinymce.plugins.flavour_shortcodes);
}