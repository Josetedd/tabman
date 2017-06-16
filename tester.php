<?php
include 'collection.php';

$pages = new Pages();

//$pages->pageheader("test");
?>
<html>
    <head>
        <title>TabMan | test</title>
        <!--//-------------------bootstrap insertion----------------------------------->
        <!-- Bootstrap -->
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- font awesome -->
        <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
        <script src="jquery-3.2.1.min.js"></script>
        <script src= "jquery-ui/jquery-ui.js"></script>
        <script src="jquery-ui/jquery-ui.min.js"></script>
        <script src="jquery-ui/jquery.ui.autocomplete.html.js"></script>
       
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesnt work if you view the page
        via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<!--//------------------------------------------------------------------------->

    </head>
    <body>
<script>
$(document).ready(function($){
    $('#merch').autocomplete({
	source:'schSearch.php', 
	minLength:5
    });
});
</script>
<div>
<form>
    <input type="text" placeholder="Name" id="merch" name="term" autocomplete="off" style="list-style: none" />
     <button type="submit">post</button>
</form>
</div>
    </body>
</html>
<?php
//$pages->pagefooter();