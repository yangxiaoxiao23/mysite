jQuery(document).ready(function() {

	// Init tabGroups
	$tabGroups = jQuery('.flavour-tabgroup');
	$tabGroups.each(function() {
		new TabGroup(jQuery(this));
	});
});


// TabGroup
function TabGroup(ele) {
	this.parent = ele,
	this.tabHandles = this.parent.find('.flavour-tabgroup-tab'),
	this.tabBoxes = this.parent.find('.flavour-tabs-tab');

	this.parent.addClass('flavour-tabgroup--init');

	for(var i=0;i<this.tabHandles.length;i++) {
		this.tabHandles.eq(i).data('tabid', i);
		this.tabBoxes.eq(i).data('tabid', i);
	}
	this.tabHandles.on('click', {self: this}, this.changeTab);

	this.changeTab(0);
}
TabGroup.prototype.changeTab = function(e) {
	var self = typeof e === "object" ? e.data.self : this,
		id = typeof e === "object" ? jQuery(this).data('tabid') : e;

	if(typeof e === "object") {
		self.activeTabHandle.removeClass('flavour-tabgroup-tab--active').find('span').attr('aria-selected', false);
		self.activeTab.removeClass('flavour-tabs-tab--active');
	}
	self.activeTabHandle = self.tabHandles.eq(id).addClass('flavour-tabgroup-tab--active');
	self.activeTabHandle.find('span').attr('aria-selected', true);
	self.activeTab = self.tabBoxes.eq(id).addClass('flavour-tabs-tab--active');
};