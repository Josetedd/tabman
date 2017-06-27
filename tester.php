<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Demo</title>
  <link rel="stylesheet" href="jquery-ui/test.css" type="text/css" /> 
</head>
<body> 

    <form action='' method='post'>
        <p><label>Country:</label><input type='text' name='school' value='' class='auto'></p>
    </form>

    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".auto").autocomplete({
        source: "schSearch.php",
        minLength: 1
    });                

});
</script>
</body>
</html>