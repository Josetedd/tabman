<?php
include 'collection.php';

/**
 * all HTML  components for the app such as
 * page header with the menu/ navigation bar, forms, e.t.c
 *
 * @author Joseph Mwangi
 */
class Pages extends report {
    /*
     * Application page header including navigation
     */

    public function pageheader($title) {
        ?>
        <html>
            <head>
                <title>TabMan | <?php echo $title; ?></title>
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
                < script src = "jquery-ui/jquery.ui.autocomplete.html.js" ></script>
                <script src="jquery-ui/jquery-ui.min"></script>
                <script src="fusioncharts/fusioncharts.js"></script>
                <script src="fusioncharts/fusioncharts.charts.js"></script>
                <script src="fusioncharts/themes/fusioncharts.theme.fint.js"></script>

                <!----------------------------Application Name----------------------------------------->
            </head>
            <body>
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.php"> iMlango Tablet Maintenance system</a>
                        </div>
                        <!-----------------------menu--------------------------------------------------->
                        <ul class="nav navbar-nav">
                            <li><a href="index.php"><span class="fa fa-lg fa-home">Home</span></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-lg fa-mobile">Tablets</span>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="tablet_view.php?page=allocate_view">Manage Tablet Allocation</a></li>
                                    <li><a href="tablet_view.php?page=ftabs">Manage Faulty Tablets</a></li>
                                    <li><a href="index.php?page=replaced">Manage Replaced Tablets</a></li>

                                </ul>
                            </li>
                            <li><a href="index.php?page=categories"><span class="fa fa-lg fa-book">Categories</span></a></li>
                            <li><a href="view_reports.php"><span class="fa fa-lg fa-pie-chart">Reports</span></a></li>
                        </ul> 
                    </div>
                </nav>
                <div class="container" style=" height: 80%">

                    <?php
                }

//======================page body left side=====================================
                public function bodyleft() {
                    ?>
                    <div class="row" style=" height: 80%">
                        <div class="col-md-8">
                            <?php
                        }

//===================== page body right side====================================
                        public function bodyright() {
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
                            public function pagefooter2() {
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
    public function pagefooter() {
        ?>
        </div>
        </body>

        </html>
        <?Php
    }

//========================Dashboard Menu===================================
    public function Dashmenu() {
        ?>
        <div class="jumbotron" style="text-align: center">
            <a href="tablet_view.php?page=allocate_view" class="btn  btn-info"><span class="fa fa-mobile fa-2x">Tablet Allocation</span></a>
            <a href="tablet_view.php?page=ftabs" class="btn  btn-danger"><span class="fa fa-wrench fa-2x">Faulty Tablets</span></a>
            <a href="tablet_view.php?page=replaced" class="btn btn-success"><span class="fa fa-recycle fa-2x">Replaced Tablets</span></a>
            <a href="index.php?page=categories" class="btn btn-warning"><span class="fa fa-cog fa-2x">issues</span></a>
            <a href="view_reports.php" class="btn btn-info"><span class="fa fa-pie-chart fa-2x">Reports</span></a>
        </div>
        <?php
    }

//========================Dashboard Reportd=====================================
    public function Dashreports() {
        ?>
        <div class="row">
             <div class="col-md-4">
                <h4>Tablets in the Field</h4>
                <a href="#">
                    <!------------------------Information on tablets in the field------------------------------------------------>
        <?php $this->incounty("100%", "40%"); ?> 
                </a>   
            </div>

            <div class="col-md-4">
                <h4>Faulty tablets</h4>
                <a href="#">
                    <!------------------------faulty tablets chart------------------------------------------------>
        <?php $this->fCounty("100%", "40%"); ?> 
                </a>   
            </div>
            <!------------------------Replaced tablets chart------------------------------------------------>
            <div class="col-md-4">
                <h4>Replaced tablets</h4>
        <?php $this->RCounty("100%", "40%"); ?>

            </div>
            <!------------------------Categories chart------------------------------------------------>
            <div class="col-md-4 ">
                <h4>Issues</h4>
        <?php $this->catreport("100%", "40%"); ?>
            </div>

        </div>
        <?php
    }

//==============report filter========================================================
    public function reportfilter() {
        ?>
        <div class="alert alert-info">
            <h4 class="fa fa-filter fa-3x">Filter</h4>

            <form class="form" method="post"action="view_reports.php?page=filter">
                <div class="form-group form-inline">
                    <label>Type</label>
                    <select class="form-control" name="ttype">
                        <optgroup>
                            <option value="1">All Faulty tablets</option>
                            <option value="2">Unreplaced tablets</option>
                            <option value="3">replaced tablets</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group form-inline">
                    <label>From:</label><input name="fdate" class="form-control" type="date" placeholder="begining of time>"/>
                    <label>to:</label><input name="tdate" class="form-control" type="date" placeholder="begining of time>"/>
                    <label>County:</label>
                    <select name="county"class="form-control">
                        <optgroup>
                            <option value="%" selected>All Counties</option>
                            <option value="kajiado">Kajiado</option>
                            <option value="kilifi">Kilifi</option>
                            <option value="makueni">Makueni</option>
                            <option value="uasin">Uasin Gishu</option>
                        </optgroup>

                    </select>
                    <label>Issues:</label>
                    <select name="fiss" class="form-control">
                        <optgroup>
                            <option value="%">All issues</option>
                            <?php
//--------------------------get issues from database and display them in a drop down list---------------------------
                            $connect = $this->dbselect();
                            $query = "select * from `categories`";
                            $result = $connect->query($query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                            }
                            ?>
                        </optgroup>
                    </select>   
                    <button type="submit" name="sbt" class="btn btn-success"><span class="fa fa-search">Search</span></button>
                </div>
            </form>
        </div>
        <?php
    }
//==================================add a category form==================================================
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
