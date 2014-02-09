var Folder = Backbone.Model.extend({
    initialize: function(){
    },
    defaults: {
        folder_id: "0",
        name: "root",
        order: "0",
        parent_id: "0",
        thumb: "folder.png",
        user_id: "0"
    }
});

var FolderCollection = Backbone.Collection.extend({
    model : Folder,
    localStorage: new Store("folders-list"),
    initialize : function(){
        for ( item in window.foldersCollection ){
            this.add( new Folder(window.foldersCollection[item]));
        }
    }
});

var FolderView = Backbone.View.extend({
    tagName:'ul',
    className: 'contain',
    initialize:function () {

    },

    render:function (eventName) {
        $(this.el).append(new FolderItemView({model:new Folder, collection: this.model.models}).render());
        return this;
    }
});

var FolderItemView = Backbone.View.extend({
    template: _.template($('#item-template').html()),
    events: {

    },
    render : function() {
        var oModel = this.model;
        var oCollection = this.collection;

        oModel.set('subitem', '');

        var subitemsCount = 0;
        _.each(oCollection, function(item){
            if ( oModel.get('folder_id') == item.get('parent_id')) {
                subitemsCount++;
            }
        });

        if (subitemsCount) {
            var counter = 1;
            _.each(oCollection, function(item){
                if (oModel.get('is_last') == undefined) {
                    oModel.set('is_last', true);
                }
                if ( oModel.get('folder_id') == item.get('parent_id')) {
                    if (counter == subitemsCount) {
                        item.set('is_last', true);
                    } else {
                        item.set('is_last', false);
                    }

                    counter++;
                    oModel.set('subitem', oModel.get('subitem') + new FolderItemView({ model:item, collection: oCollection }).render());
                }
            });
        }

        return this.template(oModel.toJSON());
    }
});

var AppRouter = Backbone.Router.extend({
    routes:{
        '':'list',
        'item/:id':'item'
    },
    list:function () {
        this.itemList = new FolderCollection();
        this.itemListView = new FolderView    ({model:this.itemList});
        $('#folder-tree').html(this.itemListView.render().el);
    },
    item:function() {

    }
});


/**
* init actions
*/
jQuery(document).ready(function(){
    $.ajax({
        url: "api/bookmark"
    }).success(function( response ) {
            window.foldersCollection = jQuery.parseJSON(response);
            var app = new AppRouter();
            Backbone.history.start();

            $('#folder-tree .expand').click(function(){
                var element = $(this);
                $('ul.contain', element.parent()).toggle();
            });
    });
});