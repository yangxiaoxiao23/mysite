/**
 * Created by YHB on 14-8-5.
 */

Ext.ns('Visa');
Ext.onReady(function () {
    Visa.northPanel = new Ext.Panel({
        region:'north',
        height: 100,
        margins: '5 5 0 5'
    });

    Visa.southPanel = new Ext.Panel({
        region: 'south',
        height: 50,
        margins: '0 5 5 5'
    });

    Visa.contentPanel = new Ext.Panel({
        region:'center',
        margins: '5 5 5 0',
        layout: 'fit'
    });

    Visa.westPanel = new Ext.Panel({
        region: 'west',
        width: 200,
        collapsible: true,
        collapseMode: 'mini',
        split:true,
        margins: '5 0 5 5'
    });

    Visa.menuPanel = new Ext.Panel({
        layout:'accordion',
        bodyBorder:false,
        border:false,
        fill :true,
        defaults: {
            bodyStyle: 'padding:5px'
        },
        layoutConfig: {
            titleCollapse: false,
            animate: true
        },
        items: [{
            id: 'question-manager',
            title: '常见问题管理',
            html: '<ul class="menu-ul"><li class="menu-li question-list active"><div></div><p>常见问题列表</p></li><li class="menu-li add-question"><div></div><p>新增常见问题</p></li></ul>'
        },{
            title: '订单管理',
            html: '<ul class="menu-ul"><li class="menu-li order-list"><div></div><p>订单列表</p></li></ul>'
        },{
            title: '资讯管理',
            html: '<p>Panel content!</p>'
        }]
    });

    Visa.westPanel.add(Visa.menuPanel);

    var border = new Ext.Viewport({
        renderTo: 'main',
        layout:'border',
        items: [Visa.northPanel, Visa.southPanel, Visa.westPanel, Visa.contentPanel]
    });


    var qustionGird = new visa.QuestionGridPanel({});
    Visa.contentPanel.add(qustionGird);
    Visa.contentPanel.doLayout();

    $('.question-list').click($.proxy(function(){
        $('.question-list').addClass('active');
    }, this));


    $('.order-list').click($.proxy(function(){
        var orderGird = new visa.OrderGridPanel({});
        Visa.contentPanel.remove(qustionGird);
        Visa.contentPanel.add(orderGird);
        Visa.contentPanel.doLayout();
    }, this));

});