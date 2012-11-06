<!DOCTYPE HTML>
<html>
<head>
    <title>Backbone Cellar</title>
    <link rel="stylesheet" href="../css/styles.css" />
</head>

<body>


<div id="game"></div>

<script type="text/template" id="item-template">
    <li class="item"><img src="image/<%= thumb %>"><span class="name"><%= name %></span></li>
</script>

<!-- JavaScript -->
<script src="../lib/jquery-1.7.1.min.js"></script>
<script src="../lib/underscore-min.js"></script>
<script src="../lib/backbone-min.js"></script>
<script src="../lib/backbone-localstorage.js"></script>
<script src="js/main.js"></script>

</body>
</html>