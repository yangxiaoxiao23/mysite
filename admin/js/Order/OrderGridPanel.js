/**
 * Created by YHB on 14-8-6.
 */

Ext.ns('visa');
visa.OrderGridPanel = Ext.extend(Ext.grid.EditorGridPanel, {

    constructor: function(config){
        var limit = 20;
        var sm = new Ext.grid.CheckboxSelectionModel();
        var store = new Ext.data.JsonStore({
            url: '/visaadmin.php/Order/read',
            fields: ['id', 'cardno', 'username', 'enname','country'],
            autoLoad: true,
            root: 'root',
            baseParams: {
                start: 0,
                limit: limit
            }
        });

        store.on('beforeload', function(store, options){
            var page = this.pagingTool.getPageData().activePage;
            var start = (page - 1) * limit;
            store.baseParams.start = start;
        }, this);

        this.pagingTool = new Ext.PagingToolbar({
            pageSize: limit,
            store: store,
            displayInfo: true
        });

        Ext.apply(config || {}, {
            title: '订单列表',
            bodyBorder:false,
            border:false,
            stripeRows :true,
            sm: sm,
            store: store,
            loadMask: true,
            viewConfig: {
                forceFit:true
            },
            cm: new Ext.grid.ColumnModel([sm, new Ext.grid.RowNumberer(),{
                xtype : 'actioncolumn',
                header : '操作',
                width : 50,
                align : 'center',
                items: [{
                    iconCls: 'visa-action-update',
                    tooltip : '编辑',
                    handler: this.doEdiUserInfo,
                    scope : this,
                    width: 20
                }, {
                    iconCls: 'visa-action-preview',
                    tooltip : '预览',
                    scope : this,
                    handler: this.doPreview,
                    width: 20
                }]
            } , {
                header: '订单编号',
                dataIndex: 'id',
                sortable: true,
                align: 'center',
                width:40
            }, {
                header: '身份证号码',
                dataIndex: 'cardno',
                width: 100
            }, {
                header: '姓名',
                dataIndex: 'username',
                width: 100
            }, {
                header: '英文名',
                dataIndex: 'enname',
                width: 100
            }, {
                header: '国籍',
                dataIndex: 'country',
                width: 100
            }]),
            tbar: [{
                xtype: 'button',
                iconCls: 'visa-action-delete',
                text: '删除订单',
                scope: this,
                handler: this.doDeleteQuestion
            }, '-', {
                xtype: 'button',
                iconCls: 'visa-action-export',
                text: '导出订单',
                scope: this,
                handler: this.doExportJson
            }],
            bbar: this.pagingTool
        });
        visa.OrderGridPanel.superclass.constructor.apply(this, arguments);
    },

    doAddQuestion: function(){
        this.addQuestionPanel =  this.addQuestionPanel || new visa.EditorQuestionPanel({
            listeners: {
                'addsuccess': function(){
                    this.addQuestionWin.hide();
                    this.getStore().reload();
                },
                scope : this
            }
        });
        this.addQuestionWin = this.addQuestionWin || (new Ext.Window({
            width: 1200,
            height: 700,
            layout: 'fit',
            closeAction:'hide',
            items: [this.addQuestionPanel]
        }));
        this.addQuestionWin.show();
    },

    doDeleteQuestion: function(){
        var sm = this.getSelectionModel();
        var selected = sm.getSelections();
        if(!selected.length){
            Ext.Msg.alert('警告','请先选择要删除的记录!');
            return;
        } else {
            Ext.Msg.show({
                title:'提示',
                msg: '你确定要删除吗,删除的数据将不可恢复?',
                buttons: Ext.Msg.YESNO,
                fn: function(result, msg, dialog){
                    if(result === 'yes'){
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
                },
                scope: this,
                icon: Ext.MessageBox.QUESTION
            });
        }
    },

    doPreview: function(grid, row){
        var id = this.getStore().getAt(row).id;
        window.open("/index.php/Article/read/id/" + id);
    },

    doExportJson: function(){
        var sm = this.getSelectionModel();
        var selected = sm.getSelections();
        if(!selected.length){
            Ext.Msg.alert('警告','请先选择要导出的订单!');
            return;
        } else {
            var orderId = [];
            Ext.each(selected, function(record, index, records){
                orderId.push(record.id);
            });
            Ext.Ajax.request({
                url: '/visaadmin.php/Order/exportJson',
                scope: this,
                success: function(){
                    //this.getStore().reload();
                    Ext.Msg.alert('提示', '导出成功');
                },
                failure: function(){
                    Ext.Msg.alert('提示', '导出失败');
                },
                params: {
                    ids: orderId.join(',')
                }
            });
        }
    },
    
    doEdiUserInfo: function(grid, row){
    	var id = this.getStore().getAt(row).id;
    	window.open('/visaadmin.php/Order/editor/id/' + id);
    }
});