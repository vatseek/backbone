var Game = Backbone.Model.extend({
    initialize: function(){
    },
    defaults: {
        folder_id: "0",
        name: "name",
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

var GameView = Backbone.View.extend({
    tagName:'ul',
    initialize:function () {
        this.model.bind("reset", this.render, this);
    },

    render:function (eventName) {
        _.each(this.model.models, function (items) {
            $(this.el).append(new GameItemView({model:items}).render().el);
        }, this);
        return this;
    }
});

var GameItemView = Backbone.View.extend({
    template: _.template($('#item-template').html()),
    render : function() {
        //console.log(this.model.toJSON());
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
});

var AppRouter = Backbone.Router.extend({
    routes:{
        "":"list"
    },
    list:function () {
        this.itemList = new GamesCollection();
        console.log(this.itemList);
        this.itemListView = new GameView({model:this.itemList});
        $('#game').html(this.itemListView.render().el);
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
});