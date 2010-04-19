var Doodles = function(config) {
    config = config || {};
    Doodles.superclass.constructor.call(this,config);
};
Ext.extend(Doodles,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('doodles',Doodles);

Doodles = new Doodles();