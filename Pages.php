<?php
include 'collection.php';


/**
 * html pages
 *
 * @author Joseph Mwangi
 */
class Pages extends report{
    
//======================header part=============================================
    public function pageheader($title){
       ?>
<html>
    <head>
        <title>TabMan | <?php echo $title;  ?></title>
        <!--//-------------------bootstrap insertion----------------------------------->
        <!-- Bootstrap and css -->
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="mycss/style.css" rel="stylesheet">
        <link href="mycss/styleprint.css" rel="stylesheet" media="print">
        <!-- font awesome -->
        <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="jquery-ui/test.css">
        <script src="jquery-3.2.1.min.js"></script>
        <script src= "jquery-ui/jquery-ui.js"></script>
        <script src="jquery-ui/jquery-ui.min.js"></script>
         <script src="bootstrap/js/bootstrap.min.js">
        <script src="jquery-ui/jquery.ui.autocomplete.html.js"></script>
        <script src="jquery-ui/jquery-ui.min"></script>
        <script src="fusioncharts/fusioncharts.js"></script>
        <script src="fusioncharts/fusioncharts.charts.js"></script>
        <script src="fusioncharts/themes/fusioncharts.theme.fint.js"></script>
        
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
          <li><a href="index.php?page=replaced">View Replaced Tablets</a></li>
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
<div class="jumbotron" style="text-align: center">
    <a href="index.php?page=ftabs" class="btn  btn-danger"><span class="fa fa-wrench fa-2x">Faulty Tablets</span></a>
    <a href="index.php?page=replaced" class="btn btn-success"><span class="fa fa-recycle fa-2x">Replaced Tablets</span></a>
    <a href="index.php?page=categories" class="btn btn-warning"><span class="fa fa-cog fa-2x">issues Categories</span></a>
    <a href="index.php?page=ftabs" class="btn btn-info"><span class="fa fa-pie-chart fa-2x">Reports</span></a>
</div>
<div class="row">
    
    <div class="col-md-4">
        <h4>Faulty tablets</h4>
        <a href="#">
<!------------------------faulty tablets chart------------------------------------------------>
           <?php $this->fCounty("100%","40%");    ?> 
        </a>   
    </div>
<!------------------------Replaced tablets chart------------------------------------------------>
    <div class="col-md-4">
        <h4>Replaced tablets</h4>
            <?php $this->RCounty("100%","40%");    ?>
            
    </div>
<!------------------------Categories chart------------------------------------------------>
    <div class="col-md-4 ">
        <h4>Issues</h4>
           <?php $this->catreport("100%","40%" ); ?>
    </div>
  
    </div>
<?php
    }





    
}
