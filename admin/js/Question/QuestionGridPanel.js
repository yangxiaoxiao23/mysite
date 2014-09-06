/**
 * Created by YHB on 14-8-6.
 */

Ext.ns('visa');

visa.QuestionGridPanel = Ext.extend(Ext.grid.EditorGridPanel, {

    constructor: function(config){
        var limit = 20;
        var sm = new Ext.grid.CheckboxSelectionModel();
        var store = new Ext.data.JsonStore({
            url: '/visaadmin.php/Question/read',
            fields: ['id', 'title'],
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
            title: '常见问题列表',
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
                header: '问题编号',
                dataIndex: 'id',
                sortable: true,
                align: 'center',
                width:40
            }, {
                header: '问题标题',
                dataIndex: 'title',
                width: 700
            }]),
            tbar: [{
                xtype: 'button',
                iconCls: 'visa-action-add',
                text: '新增问题',
                scope: this,
                handler: this.doAddQuestion
            }, '-', {
                xtype: 'button',
                iconCls: 'visa-action-delete',
                text: '删除问题',
                scope: this,
                handler: this.doDeleteQuestion
            }, '-'],
            bbar: this.pagingTool
        });
        visa.QuestionGridPanel.superclass.constructor.apply(this, arguments);
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
    }
});