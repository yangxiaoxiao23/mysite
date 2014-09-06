/**
 * Created by YHB on 14-8-6.
 */

Ext.ns('visa');

visa.QuestionGridPanl = Ext.extend(Ext.grid.EditorGridPanel, {

    constructor: function(config){

        var sm = new Ext.grid.CheckboxSelectionModel();

        var store = new Ext.data.JsonStore({
            url: '/visaadmin.php/Question/read',
            fields: ['id', 'title'],
            autoLoad: true
        })

        var action = new Ext.grid.ActionColumn({
            header: '操作',
            align: 'center',
            width: 60,
            iconCls: 'visa-action-update',
            items: [{
                getClass: function(v, meta, rec) {  // Or return a class from a function
                    return 'visa-action-update';
                }
            }]
        });

        Ext.apply(config || {}, {
            title: '常见问题列表',
            layout: 'fit',
            autoHeight: true,
            bodyBorder:false,
            border:false,
            sm: sm,
            store: store,
            columns: [sm, new Ext.grid.RowNumberer(), action, {
                header: '问题编号',
                dataIndex: 'id',
                sortable: true,
                align: 'center',
                width:80
            }, {
                header: '问题标题',
                dataIndex: 'title',
                width: 700
            }],
            tbar: [{
                xtype: 'button',
                iconCls: 'visa-action-add',
                text: '新增问题'
            }, '-', {
                xtype: 'button',
                iconCls: 'visa-action-delete',
                text: '删除问题',
                scope: this,
                handler: function(){
                    var sm = this.getSelectionModel();
                    var selected = sm.getSelections();
                    if(!selected.length){
                        Ext.Msg.alert('警告','请先选择要删除的记录!');
                        return;
                    }
                    var deleteId = [];
                    Ext.each(selected, function(record, index, records){
                        deleteId.push(record.id);
                    });

                    Ext.Ajax.request({
                        url: '/visaadmin.php/Question/delete',
                        scope: this,
                        success: function(){
                            this.getStore().reload();
                        },
                        failure: function(){
                            this.getStore().reload();
                        },
                        params: {
                            id: deleteId.join(',')
                        }
                    });
                }
            }, '-', {
                xtype: 'button',
                iconCls: 'visa-action-update',
                text: '更新问题'
            }]
        });
        visa.QuestionGridPanl.superclass.constructor.apply(this, arguments);
    }
});