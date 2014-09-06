/**
 * Created by YHB on 14-8-6.
 */
Ext.ns('visa');
visa.EditorQuestionPanel = Ext.extend(Ext.form.FormPanel,  {

    constructor: function(config){

        this.titleField = new Ext.form.TextField({
            fieldLabel: '标题',
            emptyText: '请输入问题标题',
            name: 'title',
            height:24,
            width: 800
        });

        this.editorContentPanel = new Ext.form.TextArea({
            id: 'editor',
            fieldLabel: '内容',
            width: 1030,
            height: 600
        });

        Ext.apply(config, {
            border:false,
            bodyBorder:false,
            labelAlign: 'right',
            labelWidth: 30,
            waitMsgTarget: true,
            title: '新增/编辑问题',
            defaultType: 'textfield',
            bodyStyle: {
                background:'#dfe8f6',
                padding:'20px 10px'
            },
            items: [this.titleField, this.editorContentPanel],
            tbar: [{
                text: '保存',
                iconCls: 'visa-action-save',
                handler: this.doSaveQuesiton,
                scope: this
            }, {
                text: '清空',
                iconCls: 'visa-action-clear',
                handler: this.doClearContent,
                scope: this
            }]
        });
        visa.EditorQuestionPanel.superclass.constructor.apply(this, arguments);

        this.addEvents('addsuccess');
        this.editorContentPanel.on('afterrender', function(){
            this.uEditor = UE.getEditor('editor', {
                initialFrameHeight: 400,
                zIndex: 10000,
                autoHeightEnabled: false
            });
        }, this);
    },

    doSaveQuesiton: function(){
        var title = this.titleField.getValue();
        var content = this.uEditor.getContent();

        Ext.Ajax.request({
            url: '/visaadmin.php/Question/insert',
            params: {
                title : title ,
                content : content
            },
            scope: this,
            success: function(){
                this.fireEvent('addsuccess', this);
            }
        });
    },

    doClearContent: function(){
        this.titleField.setValue('');
        this.uEditor.setContent('');
    }
});