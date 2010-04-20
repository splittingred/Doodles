Doodles.grid.Doodles = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'doodles-grid-doodles'
        ,url: Doodles.config.connector_url
        ,baseParams: { action: 'mgr/doodle/getList' }
        ,save_action: 'mgr/doodle/updateFromGrid'
        ,fields: ['id','name','description','menu']
        ,paging: true
        ,autosave: true
        ,remoteSort: true
        ,anchor: '97%'
        ,autoExpandColumn: 'name'
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,sortable: true
            ,width: 60
        },{
            header: _('doodles.name')
            ,dataIndex: 'name'
            ,sortable: true
            ,width: 100
            ,editor: { xtype: 'textfield' }
        },{
            header: _('doodles.description')
            ,dataIndex: 'description'
            ,sortable: false
            ,width: 350
            ,editor: { xtype: 'textfield' }
        }]
        ,tbar: [{
            xtype: 'textfield'
            ,id: 'doodles-search-filter'
            ,emptyText: _('doodles.search...')
            ,listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this.getValue());
                            this.blur();
                            return true; }
                        ,scope: cmp
                    });
                },scope:this}
            }
        },{
            text: _('doodles.doodle_create')
            ,handler: { xtype: 'doodles-window-doodle-create' ,blankValues: true }
        }]
    });
    Doodles.grid.Doodles.superclass.constructor.call(this,config)
};
Ext.extend(Doodles.grid.Doodles,MODx.grid.Grid,{
    search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    ,updateDoodle: function(btn,e) {
        if (!this.updateDoodleWindow) {
            this.updateDoodleWindow = MODx.load({
                xtype: 'doodles-window-doodle-update'
                ,record: this.menu.record
                ,listeners: {
                    'success': {fn:this.refresh,scope:this}
                }
            });
        }
        this.updateDoodleWindow.setValues(this.menu.record);
        this.updateDoodleWindow.show(e.target);
    }

    ,removeDoodle: function() {
        MODx.msg.confirm({
            title: _('doodles.doodle_remove')
            ,text: _('doodles.doodle_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/doodle/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:this.refresh,scope:this}
            }
        });
    }
});
Ext.reg('doodles-grid-doodles',Doodles.grid.Doodles);


Doodles.window.CreateDoodle = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('doodles.doodle_create')
        ,url: Doodles.config.connector_url
        ,baseParams: {
            action: 'mgr/doodle/create'
        }
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('doodles.name')
            ,name: 'name'
            ,width: 300
        },{
            xtype: 'textarea'
            ,fieldLabel: _('doodles.description')
            ,name: 'description'
            ,width: 300
        }]
    });
    Doodles.window.CreateDoodle.superclass.constructor.call(this,config);
};
Ext.extend(Doodles.window.CreateDoodle,MODx.Window);
Ext.reg('doodles-window-doodle-create',Doodles.window.CreateDoodle);


Doodles.window.UpdateDoodle = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('doodles.doodle_update')
        ,url: Doodles.config.connector_url
        ,baseParams: {
            action: 'mgr/doodle/update'
        }
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('doodles.name')
            ,name: 'name'
            ,width: 300
        },{
            xtype: 'textarea'
            ,fieldLabel: _('doodles.description')
            ,name: 'description'
            ,width: 300
        }]
    });
    Doodles.window.UpdateDoodle.superclass.constructor.call(this,config);
};
Ext.extend(Doodles.window.UpdateDoodle,MODx.Window);
Ext.reg('doodles-window-doodle-update',Doodles.window.UpdateDoodle);