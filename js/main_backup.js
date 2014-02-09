var Game = Backbone.Model.extend({
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

var GamesCollection = Backbone.Collection.extend({
    model : Game,
    localStorage: new Store("todos-backbone"),
    initialize : function(){
        for ( item in window.collectionItem ){
            this.add( new Game(window.collectionItem[item]));
        }
    }
});

var Files = Backbone.Model.extend({
    initialize: function(){
    },
    defaults: {
        document_id : '0',
        name : 'file_name',
        url : '',
        order : ''
    }
});

var FilesCollection = Backbone.Collection.extend({
    model : Files,
    initialize : function(){
        for ( item in window.collectionItem ){
            this.add( new Game(window.collectionItem[item]));
        }
    }
});


var GameView = Backbone.View.extend({
    tagName:'ul',
    initialize:function () {
        //this.model.bind("reset", this.render, this);
    },

    render:function (eventName) {
        $(this.el).append(new GameItemView({model:new Game, collection: this.model.models}).render());
        return this;
    }
});

var GameItemView = Backbone.View.extend({
    template: _.template($('#item-template').html()),
    events: {
        'click': 'eClick'
    },

    render : function() {
        var oModel = this.model;
        var oCollection = this.collection;

        console.log(oCollection);

        oModel.set('subitem', '');
        _.each(oCollection, function(item){
            if ( oModel.get('folder_id') == item.get('parent_id')) {
                oModel.set('subitem', oModel.get('subitem') + new GameItemView({model:item, collection: oCollection}).render());
            }
        });

        return this.template(oModel.toJSON());
    },

    eClick: function() {

    }
});

var AppRouter = Backbone.Router.extend({
    routes:{
        "":"list",
        "item/:id":"item"
    },
    list:function () {
        this.itemList = new GamesCollection();
        this.itemListView = new GameView    ({model:this.itemList});
        $('#game').html(this.itemListView.render().el);
    },
    item:function() {

    }
});

jQuery(document).ready(function(){
    $.ajax({
        url: "api/bookmark"
    }).success(function( response ) {
            window.collectionItem = jQuery.parseJSON(response);
            var app = new AppRouter();
            Backbone.history.start();
    });

//   jQuery('#game').on('click', 'span.name', function(event){
//       element = event.target;
//       jQuery(jQuery('ul', $(element).parent())[0]).toggle();
//   });
});
