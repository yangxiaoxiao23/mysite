/**
 * Created by YHB on 14-8-6.
 */
Ext.ns('visa.form');
visa.form.CkeditorPanel = function(config){
    visa.form.CkeditorPanel.superclass.constructor.apply(this, arguments);
}

Ext.extend(visa.form.CkeditorPanel, Ext.form.TextArea, {

    constructor: function(config){



        visa.form.CkeditorPanel.superclass.constructor.apply(this, arguments);
    }
});
