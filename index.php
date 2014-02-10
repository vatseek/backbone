<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>Off Canvas Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container main-container">
    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-sm-4 hidden-xs" id="sidebar" role="navigation">
            <div class="list-group" id="folder-tree">

            </div>
        </div><!--/span-->
        <div class="col-xs-12 col-sm-8">
            <div class="row" id="content-item">
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/span-->
            </div><!--/row-->
        </div><!--/span-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; Company 2013</p>
    </footer>

</div><!--/.container-->

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

<script type="text/template" id="item-template">
    <li class="node e_open <% if(is_last){ %>is_last<% } %> <% if(!subitem.length){ %>e_leaf<% } %>">
        <div class="expand"></div>
        <a class="content" href="#item/<%= folder_id %>"><%= name %></a>
        <% if(subitem){ %>
            <ul class="contain"><%=subitem %></ul>
        <% } %>
    </li>
</script>

<script type="text/template" id="item-list-template">
    <li>   asdas
        <%= folder_id %>
    </li>
</script>

<script src="lib/underscore-min.js"></script>
<script src="lib/backbone-min.js"></script>
<!--<script src="lib/backbone-localstorage.js"></script>-->
<script src="js/main.js"></script>

</body>
</html>