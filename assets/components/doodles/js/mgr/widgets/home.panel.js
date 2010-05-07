Doodles.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,items: [{
            html: '<h2>'+_('doodles.management')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,bodyStyle: 'padding: 10px'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,stateful: true
            ,stateId: 'doodles-home-tabpanel'
            ,stateEvents: ['tabchange']
            ,getState:function() {
                return {activeTab:this.items.indexOf(this.getActiveTab())};
            }
            ,items: [{
                title: 'Doodles'
                ,defaults: { autoHeight: true }
                ,items: [{
                    html: '<p>'+_('doodles.management_desc')+'</p><br />'
                    ,border: false
                },{
                    xtype: 'doodles-grid-doodles'
                    ,preventRender: true
                }]
            }]
        }]
    });
    Doodles.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Doodles.panel.Home,MODx.Panel);
Ext.reg('doodles-panel-home',Doodles.panel.Home);
