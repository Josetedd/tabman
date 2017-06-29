<?php
include 'collection.php';


/**
 * html pages
 *
 * @author Joseph Mwangi
 */
class Pages extends dbconn{
//======================header part=============================================
    public function pageheader($title){
       ?>
<html>
    <head>
        <title>TabMan | <?php echo $title;  ?></title>
        <!--//-------------------bootstrap insertion----------------------------------->
        <!-- Bootstrap -->
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- font awesome -->
        <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="jquery-ui/test.css">
        <script src="jquery-3.2.1.min.js"></script>
        <script src= "jquery-ui/jquery-ui.js"></script>
        <script src="jquery-ui/jquery-ui.min.js"></script>
         <script src="bootstrap/js/bootstrap.min.js">
        <script src="jquery-ui/jquery.ui.autocomplete.html.js"></script>
        <script src="jquery-ui/jquery-ui.min"></script>
        
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
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#"> iMlango Tablet Maintenance system</a>
            </div>
<!-----------------------menu--------------------------------------------------->
             <ul class="nav navbar-nav">
                 <li><a href="index.php"><span class="fa fa-lg fa-home">Home</span></a></li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-lg fa-mobile">Tablets</span>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="index.php?page=ftabs">View Faulty Tablets</a></li>
          <li><a href="index.php?page=returned">Add Faulty Tablet</a></li>
          <li><a href="#">Faulty Tablets</a></li>
          <li><a href="#">Tablet Reports</a></li>
        </ul>
      </li>
      <li><a href="index.php?page=categories"><span class="fa fa-lg fa-book">Categories</span></a></li>
      <li><a href="#"><span class="fa fa-lg fa-pie-chart">Reports</span></a></li>
    </ul> 
          </div>
        </nav>
        <div class="container" style=" height: 80%">
       
  <?php     
    }
//======================page body left side=====================================
            public function bodyleft(){
?>
            <div class="row" style=" height: 80%">
                <div class="col-md-8">
<?php
            }
//===================== page body right side====================================
            public function bodyright(){
?>
            </div>
                <div class="col-md-4 panel panel-default">
                    <div class="panel panel-heading">
                        information Board
                    </div>
                    <div class="panel panel-body">
                    
<?php
                
            }
//===================divided page footer========================================
            public function pagefooter2(){
?>
                    </div>
                </div>
                </div>
            </div>
              </div>
    </body>
<?php
            }

//=====================page footer==============================================
    public function pagefooter(){
        ?>
        </div>
    </body>
    
</html>
        <?Php
    }
//========================Main Page Dashboard===================================
    public function mainDash(){
?>
<div class="well" >
    
</div>
<?php
    }

//=============================new returned tablet==============================
    public function frmfield(){
        $dbconn=new dbconn();
        ?>

    <div class="row">
        <div class="col-md-8" style="background:grey; border-radius:25px">
    <h3 style="text-decoration: underline">RETURNED TABLET</h3>
    <form action="index.php?page=add" method="post">
        <div class="form-group"><div>
    <label for="merchant">School:</label>
    
    <!----------search for school in db-------------------------------------------->
    <script>
$(document).ready(function($){
    $('#merch').autocomplete({
	source:'schSearch.php', 
	minLength:2
    });
});
</script>
</script>
            </div>
<input  id="merch" class="form-control" type="text" name="merchant" placeholder="School Name" required />
    </div>
 <!---------------end--------------------------------------------------------------->
    <div class="form-group">
    <label for="sqcode">Squid Code:</label><input  class="form-control" type="text" name="sqcode" placeholder="Squid Code" required />
    </div>
    <div class="form-group">
    <label for="county">County</label>
<!--------------------------get county name------------------------------------------>
    <select class="form-control" name="county" required placeholder="select county">
        <optgroup>
            <option value="" disabled selected>Select County</option>
            <option>Kilifi</option>
            <option>Makueni</option>
            <option>Kajiado</option>
            <option>Uasin Gishu</option>
        </optgroup>
    </select>
    </div>
    <div class="form-group">
        <label for="retdate">Return Date:</label><input class="form-control" type="date" name="retdate" placeholder="Date" required/>
    </div>
    <div class="form-group">
        <label for="issue">Category</label>
         <select class="form-control" name="issue" required>
            <optgroup>
                <option value="" disabled selected>Select issue</option>
<?php
//connect to db
$connect=  $this->dbselect();
$query="select * from categories";
$result= $connect->query($query);
while ($row=  mysqli_fetch_array($result)){
    echo '<option value="'.$row['category'].'">'.$row['category'].'</option> ';  
}
?>
            </optgroup>
        </select>
    </div>
    <div class="form-group">
        <label for="sam">SAM?:</label><input type="checkbox" name="sam" value="yes">    
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success"type="submit" name="sbt">Save</button>
        <button class="btn btn-sm btn-success" type="reset" name="rst">Clear</button>
            
    </div>
</form>
</div>
</div>

<?php
    }
//======================Add new Category========================================    
    public function Addcat() {
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h3 style="text-align: center"><small>New Category</small></h3>
    <form action="index.php?page=savecat" method="post">
       
        <div class="form-group">
            <label for="CatName">Category Name</label>
            <input class="form-control" type="text" name="CatName"/>
        </div>
         <div class="form-group">
             <button type="submit" name="sbt" class="btn-sm btn-success">Save</button>
             <button type="clear"  class="btn-sm btn-success">Clear</button>
        </div>
        
    </form>
    </div>
</div>

<?php        
    }

    
}
