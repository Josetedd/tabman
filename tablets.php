<?php

/**
 * This class contains all methods for adding, viewing, updating tablet records
 * @author Joseph Mwangi
 *
 */
class Tablets extends dbconn {
    //==============================allocate new tablet=========================
    //----------------page for adding tablet-----------------------------------
    public function addTablet(){
        ?>
 <div class="row">
                <form class="form" action="tablet_view.php?page=add_new" method="post">
                    <div class="col-md-6 col-md-offset-3" style="background-color: #4cb14d; color: white ">
                        <h2 align="center">Add Tablet</h2>
                            <div class="form-group"> 
                        <label for="serial">Serial No:</label><input  class="form-control" type="number" name="serial" placeholder="Serial Number" required />
                    </div>
                    <div class="form-group">
                        <label for="sqcode">Squid Code:</label><input  class="form-control" type="text" name="sqcode" placeholder="Squid Code" required />
                    </div>
                    <div class="form-group">
                         <label for="status">Status:</label>
                         <select class="form-control" name="tablet_status">
                             <option value="active">Active</option>
                             <option value="faulty">Faulty</option>
                         </select>
                    </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-default" name="sbt">Add</button>
                            </div>  
                        </div>
                </form>
            
         </div>
<?php
    }
    //----------------tablet allocation----------------------------------------
    public function allocateTab(){
        ?>
       ---------------------tablet allocation form----------------------->
         <div class="row">
            <div class="col-md-8" style="background:grey; border-radius:25px">
                <h3 style="text-decoration: underline">New Tablet</h3>
                <form action="tablet_view.php?page=allocate" method="post">
                    <div class="form-group">
                        <label for="serial">Serial No:</label><input  class="form-control" type="number" name="serial" placeholder="Serial Number" required />
                    </div>
                    <div class="form-group">
                        <label for="sqcode">Squid Code:</label><input  class="form-control" type="text" name="sqcode" placeholder="Squid Code" required />
                    </div>
                    <div class="form-group"><div>
                            <label for="merchant">School:</label>

                            <!----------search for school in db-------------------------------------------->
                            <script>
                                $(document).ready(function ($) {
                                    $('#merch').autocomplete({
                                        source: 'schSearch.php',
                                        minLength: 2
                                    });
                                });
                            </script>
                        </div>
                        <input  id="merch" class="form-control" type="text" name="merchant" placeholder="School Name" required />
                    </div>
                    <!---------------end--------------------------------------------------------------->
                    
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
    //-----------------------------add new tablet to database--------------------
    public function newtabProcess($serial,$sqcode,$school,$county,$sam){
        // check if tablet is already allocated
        $connection = $this->dbselect();
        $query = "select * from `tabletallocation` where `serialNo`=$serial OR `squidCode` =$sqcode";
        $result = $connection->query($query);
        if (mysqli_num_rows($result) > 0) {
         echo '<div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Tablet with that serial number or squid Code already EXISTS!!</strong> Reallocate it here
                            </div>';
         
        } 
        else {
            $sql="INSERT INTO `tabletallocation`(`serialNo`, `squidCode`, `school`, `county`, `sam`)"
                    . " VALUES('$serial','$sqcode','$school','$county','$sam')";
            if($connection->query($sql)){
             echo '<div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Saved!</strong> Tablet Added Successfully.
                    </div>';
                    }else {
                    echo '<div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Not Saved!</strong> Contact admin
                            </div>';
                }
            
        }
    $this->allocatedview();
        
    }
//===============================view allocated tablets=========================
    public function allocatedview(){
       $connection = $this->dbselect();
        $query = "SELECT * FROM `tabletallocation`";
        $result = $connection->query($query);
        ?>
        <div>
            <div>
            <h1 style="text-align: center">Tablets in Schools</h1>
           
            <a class="btn btn-info" href="tablet_view.php?page=new_tablet"><span class="fa fa-plus-square">Add new tablet</span></a>
            <!--<a class="btn btn-danger" href="tablet_view.php?page=faulty"><span class="fa fa-plus">Mark Faulty</span></a>-->
            <br/>
            <hr/>
            </div>
             <?php $this->fsearch(); ?>
            <table class="table table-striped">
                <tr>
                    <td>Serial No</td><td>Squid Code</td><td>School</td><td>County</td><td>SAM</td><td></td><td></td>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    if ($row['sam'] == 1) {
                        $sam = "Yes";
                    } else {
                        $sam = "No";
                    }
                    echo "<tr>
            <td>" . $row['serialNo'] . "</td><td>" . $row['squidCode'] . "</td><td>" . $row['school'] . "</td><td>" . $row['county'] . "</td><td>" . $sam . "</td>
        <td>";
            //show Edit and Faulty button
                    echo '<a class="btn btn-success btn-sm" href="tablet_view.php?page=edit_allocate&id=' . $id . '"><span class="fa fa-pencil">Edit<span></a>';
                    echo '</td><td><a class="btn btn-danger btn-sm" href="tablet_view.php?page=disp&id=' . $id . '"><span class="fa fa-ban">Faulty<span></a>';
                    echo"</td></tr>";
                }
                ?>
            </table>
        </div>
        <?php 
    }
    //=========================Edit/reallocate tablet form===========================
    public function allocateEdit($id){
        
       
        $connection= $this->dbselect();
        $query = "SELECT * FROM `tabletallocation` WHERE `id`=$id";
        $result = $connection->query($query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            //==================================replacement form================================================
            ?>
            <div class="row">
                <form class="form" action="tablet_view.php?page=allocUpdt&id=<?php echo $id ?>" method="post">
                    <div class="col-md-6 col-md-offset-3" style="background-color: #4cb14d; color: white ">
                        <h2 align="center">Edit/Re-allocate Tablet</h2>
                        
                            <div class="form-group"> 
                                <label class="control-label" for="serial">Serial:</label>
                                <input type="text" class="form-control" name="serial" value="<?php echo $row['serialNo'] ?>">
                            </div>
                            <div class="form-group"> 
                                <label class="control-label" for="sqcode">Squid Code</label>     
                                <input type="text" class="form-control" name="sqcode" value="<?php echo $row['squidCode'] ?>">
                             
                            </div>
                            <div class="form-group">
                                <script>
                                $(document).ready(function ($) {
                                    $('#merch').autocomplete({
                                        source: 'schSearch.php',
                                        minLength: 2
                                    });
                                });
                            </script>
                                <label class="control-label" for="school">School:</label>          
                                <input id="merch" type="text" class="form-control" name="school" value="<?php echo $row['school'] ?>" >
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="county">County</label>          
                                <input type="text" class="form-control" name="county" value="<?php echo $row['county'] ?>" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default" name="sbt">Update</button>
                            </div>   
                    </div>
                </form>
            </div>
            <?php
            } 
            else {
            echo 'no  tablet selected';
            $this->Ftabview();
        }
         
    }
    //==========================update allocation edit==========================
    public function allocationUpdate($id, $serial, $sqcode, $school , $county){
        $connect = $this->dbselect();
        $sql = "UPDATE `tabletallocation` SET `serialNo`='$serial',`squidCode`='$sqcode',"
                . "`school`='$school',`county`='$county' WHERE `id`=$id"; 
        if(mysqli_query($connect, $sql)){
          echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Update succesfull!</strong>.
</div>';  
        }
        else{
            echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Not Saved!</strong> Contact admin
</div>';
        }
        mysqli_close($connect);
        $this->allocatedview();
    }
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Faulty Tablet<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    public function fsearch(){
        ?>
<div class="row">
        <div class="alert alert-info">
            <form class="form" method="post"action="tablet_view.php?page=fsresult">
                <div class="form-group form-inline">
                    <script>
                                $(document).ready(function ($) {
                                    $('#merch').autocomplete({
                                        source: 'schSearch.php',
                                        minLength: 2
                                    });
                                });
                            </script>
                    <!--<label>School:</label>-->
                    <input type="text" name="school" id="merch" class="form-control" placeholder="Search School"/>
                    <button type="submit" name="sbt" class="btn btn-success"><span class="fa fa-search">Search</span></button>
                    
                </div>
            </form>
        </div>
</div>
<?php
    }
    public function fsearchresults($school){
        $num = 0;
        $connection = $this->dbselect();
        $query = "SELECT * FROM `tabletallocation` WHERE `school`='$school'";
        $result = $connection->query($query);
         
            ?>
<table class="table table-striped">
                <tr>
                    <td>#</td><td>Serial No</td><td>Squid Code</td><td></td><td></td>
                </tr>
                <?php
                if(mysqli_num_rows($result)==0){
                    
                    echo "<tr><td>no data found</td></tr>";
                }
                else{
                   
                echo "<div>School Name: ".$school."</div>";
                
                while ($row = mysqli_fetch_array($result)) {
                    $num++;
                    $id=$row['id'];
                    echo "<tr><td>".$num."</td><td>" . $row['serialNo'] . "</td><td>" . $row['squidCode'] . "</td><td>";
                    echo '<a class="btn btn-success btn-sm" href="tablet_view.php?page=edit_allocate&id=' . $id . '"><span class="fa fa-pencil">Edit<span></a>';
                        echo '</td><td><a class="btn btn-success btn-sm" href="tablet_view.php?page=disp&id=' . $id . '"><span class="fa fa-refresh">Faulty<span></a>';
                    echo"</td></tr>";
                }
                }
                ?>
            </table>
        </div>
        <?php
    }

//=============================new Faulty tablet==============================
    public function markFaulty($id){
        //connect to db and return details
        $connection= $this->dbselect();
        $query = "SELECT * FROM `tabletallocation` WHERE `id`='$id'";
        $result = $connection->query($query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            ?>
        <div class="row">
                <form class="form" action="tablet_view.php?page=add&id=<?php echo $id ?>" method="post">
                    <div class="col-md-6 col-md-offset-3" style="background-color: #4cb14d; color: white ">
                        <h2 align="center">Add Faulty Tablet</h2>
                        
                            <div class="form-group"> 
                                <label class="control-label" for="serial">Serial:</label>
                                
                                <input type="hidden" class="form-control" name="serial" value="<?php echo $row['serialNo'] ?>">
                                <input type="text" class="form-control" name="serial1" value="<?php echo $row['serialNo'] ?>" disabled>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label" for="sqcode">Squid Code</label>     
                                <input type="hidden" class="form-control" name="sqcode" value="<?php echo $row['squidCode'] ?>">
                                <input type="text" class="form-control" name="sqcode1" value="<?php echo $row['squidCode'] ?>" disabled>
                             
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="school">School:</label>
                                <input type="hidden" class="form-control" name="county" value="<?php echo $row['county'] ?>">
                                <input  type="hidden" class="form-control" name="school" value="<?php echo $row['school'] ?>" >
                                <input  type="text" class="form-control" name="school1" value="<?php echo $row['school'] ?>" disabled>
                            </div>
                        <div class="form-group">
                                <label class="control-label" for="school">Returned on:</label> 
                                <input  type="date" class="form-control" name="rdate" value="<?php echo $row['school'] ?>" required>
                            </div>
                        
                            <div class="form-group">
                        <label for="issue">Category</label>
                        <select class="form-control" name="issue" required>
                            <optgroup>
                                <option value="" disabled selected>Select issue</option>
                                <?php
//connect to db
                                $connect = $this->dbselect();
                                $query = "select * from categories";
                                $result = $connect->query($query);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option> ';
                                }
                                ?>
                            </optgroup>
                        </select>
                    </div>
                        <div class="form-group">
                        <label for="sam">SAM?:</label><input type="checkbox" name="sam" value="yes">    
                    </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default" name="sbt">Update</button>
                            </div>   
                    </div>
                </form>
            </div>
            <?php
            
        }
        else {
            echo 'could not retrieve tablet details please contact admin';
        }
    }
    //
    function processFaultyTablet($id, $serial, $sqcode, $school,$county,$date, $issue, $sam){
        //connect to db and add details to faulty tablets table
        $connect = $this->dbselect();
        $sql= "INSERT INTO `returned`(`serialNo`, `squidcode`, `school`,`county`, `rdate`, `tissue`, `sam`) "
            . "VALUES ('$serial','$sqcode','$school','$county','$date','$issue','$sam')";
        $sql2 ="DELETE FROM `tabletallocation` WHERE `id`='$id'";
        if($connect->query($sql)){
            if($connect->query($sql2)){
                echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Saved!</strong>.
</div>';
            }
            
        }
 else {
    echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Not Saved!</strong> Contact admin
</div>';
}
        
        
    }

    //======================**view Faulty tablets**================================
    function Ftabview() {
        $connection = $this->dbselect();
        $query = "select * from returned ORDER BY replaced ASC, rdate DESC";
        $result = $connection->query($query);
        ?>
        <div>
            <h1 style="text-align: center">Faulty Tablets</h1>
            <a class="btn btn-danger" href="tablet_view.php?page=faulty"><span class="fa fa-plus">Add Faulty Tablet</span></a>
            <a class="btn btn-info" href="tablet_view.php?page=new_tablet"><span class="fa fa-plus-square">Add new tablet</span></a>
            <br/>
            <table class="table table-striped">
                <tr>
                    <td>Serial</td><td>Squid Code</td><td>School</td><td>Issue</td><td>returned on</td><td>SAM</td>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['tabId'];
                    if($row['sam']==1){
                        $sam = "yes";
                    }
                    else{
                      $sam= "no";  
                    }
                    echo "<tr>
            <td>" . $row['serialNo'] . "</td><td>" . $row['squidcode'] . "</td><td>" . $row['school'] . "</td><td>" . $row['tissue'] . "</td><td>" . $row['rdate'] . "</td>
            <td>".$sam."</td><td>";
//show replace button if not replaced and replace if replaced
                    if ($row['replaced'] == 0) {
                        echo '<a class="btn btn-success btn-sm" href="tablet_view.php?page=disp&id=' . $id . '"><span class="fa fa-refresh">replace<span></a>';
                    } else {
                        echo '<span class="btn btn-danger btn-sm disabled">Replaced</span>';
                    }

                    echo"</td></tr>";
                }
                ?>
            </table>
        </div>
        <?php
    }

    //=====================**replace tablet**======================================
    function tabrep($tabid) {
        $connection = $this->dbselect();
        $query = "select * from `returned` where `tabId`=$tabid";
        $result = $connection->query($query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            //==================================replacement form================================================
            ?>
            <div class="row">
                <form class="form-horizontal" action="index.php?page=repadd" method="post">
                    <div class="col-md-10 col-md-offset-1" style="background-color: #4cb14d; ">
                        <h2>Tablet Replacement</h2>
                        <div class="col-md-6 " style="border-right: 1px solid #f4eded">
                            <span style="center">You are Replacing</span>
                            <div class="form-group"> 
                                <label class="control-label col-md-3" for="fcode">Code:</label>
                                <div class="col-md-9"><input type="text" class="form-control" id="fcode" value="<?php echo $row['squidcode'] ?>" disabled></div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-md-3" for="fsch">From:</label>
                                <div class="col-md-9">        
                                    <input type="text" class="form-control" id="fsch" value="<?php echo $row['merchant'] ?>" disabled>
                                    <!--------------------------hidden inputs-------------------------------------------------------->         
                                    <input type="hidden" class="form-control" name="fschl" value="<?php echo $row['merchant'] ?>" >
                                    <input type="hidden" class="form-control" name="tabid" value="<?php echo $tabid ?>" >

                                    <!----------------------------------------------------------------------------------------------->     
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="fsch">Date:</label>
                                <div class="col-md-9">          
                                    <input type="text" class="form-control" id="fsch" value="<?php echo $row['rdate'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <span>Replacement</span>
                            <div class="form-group"> 
                                <label class="control-label col-md-3" for="rcode">Squid Code:</label>
                                <div class="col-md-9">          
                                    <input type="text" class="form-control" name="rcode" required>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-md-3" for="rime">IMEI1:</label>
                                <div class="col-md-9">          
                                    <input type="text" class="form-control" name="rime" required>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-md-3" for="rsam">SAM:</label>
                                <div class="col-md-9">          
                                    <input type="checkbox" name="rsam"value="yes">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4">
                                    <button type="submit" class="btn btn-default" name="sbt">Save & generate Delivery</button>
                                </div>
                            </div>

                        </div>
                    </div>          
                </form>
            </div>
            <?php
            //==================================================================================================
        } else {
            echo 'no Faulty tablet selected';
            $this->Ftabview();
        }
    }

    //=============================view Replaced tablets============================
    function tabview() {
        $connection = $this->dbselect();
        $query = "select * from replaced";
        $result = $connection->query($query);
        ?>
        <div>
            <h1 style="text-align: center">Replaced Tablets</h1>
            <a class="btn btn-primary" href="tablet_view.php?page=ftabs"><span class="fa fa-eye">View Faulty Tablets</span></a>
            <a class="btn btn-info" href="tablet_view.php?page=new_tablet"><span class="fa fa-plus-square">Add New Tablet</span></a>
            <a class="btn btn-danger" href="tablet_view.php?page=faulty"><span class="fa fa-eye">Add Faulty Tablets</span></a>
            <br/>
            <table class="table table-striped">
                <tr>
                    <td>School</td><td>Imei</td><td>Squid Code</td><td>Sam</td><td>replaced on</td>
                </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {

            $id = $row['repId'];
            if ($row['sam'] == 1) {
                $sam = "Yes";
            } else {
                $sam = "No";
            }
            echo "<tr>
            <td>" . $row['school'] . "</td><td>" . $row['imei1'] . "</td><td>" . $row['sqcode'] . "</td><td>" . $sam . "</td><td>" . $row['rdate'] . "</td>
        <td>";
//show View Delivery Note
            echo '<a class="btn btn-success" href="tablet_view.php?page=dnote&id=' . $id . '"><span class="fa fa-file-pdf-o">Delivery Note<span></a>';
            echo"</td></tr>";
        }
        ?>
            </table>
        </div>
                <?php
            }
//================================insert replace tablet data====================================
            public function Repadd($sql1, $sql2) {
                $connection = $this->dbselect();
                if (mysqli_query($connection, $sql1)) {
                    if (mysqli_query($connection, $sql2)) {
                        echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Saved!</strong> Tablet successfully replaced.
</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Not Saved!</strong> Contact admin
</div>';
                }
                $this->tabview();
            }

//============================Print Delivery Note==================================================
            public function dNote($tabid) {
                $connection = $this->dbselect();
                $query = "select * from `replaced` where `repId`=$tabid";
                $result = $connection->query($query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div>
                        <a  href="tablet_view.php?page=replaced" class="btn btn-info notprint"><span class="fa fa-backward">Back</span></a>
                        <button onclick="window.print()" class="btn btn-success notprint"><span class="fa fa-print">Print</span></button>



                    </div>
                    <div class="dnheader">
                        <img src="images/dnheader.jpg"/>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered">
                            <tr><td>DN No:<?php echo $tabid; ?></td><td>School: <?php echo $row['school']; ?></td><td>Date:<?php echo $row['rdate']; ?></td></tr>
                            <tr><td colspan="3">Field officer:</td></tr>
                        </table>
                        <span>Please receive the undermentioned in good condition </span>
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th><th>Quantity</th><th>Specification/Description</th><th>Serial Number</th>
                            </tr>
                            <tr><td>1.</td><td>1 PC</td><td>iMlango attendance tablet</td><td><?php echo $row['imei1']; ?></td></tr>
                            <tr><td>2.</td><td></td><td></td><td></td></tr>
                            <tr><td>3.</td><td></td><td></td><td></td></tr>
                            <tr><td>4.</td><td></td><td></td><td></td></tr>
                            <tr><td>5.</td><td></td><td></td><td></td></tr>
                            <tr><td>6.</td><td></td><td></td><td></td></tr>
                        </table>
                    </div>
                    <div>
                        <table>
                            <tr><td>Delivered By:</td><td>____________________________</td><td>Received By:</td><td>____________________________</td></tr>
                            <tr><td>Designation:</td><td>____________________________</td><td>Designation:</td><td>____________________________</td></tr>
                            <tr><td>Signature:</td><td>____________________________</td><td>Signature:</td><td>____________________________</td></tr>
                            <tr><td>Date:</td><td>____________________________</td><td>Date:</td><td>____________________________</td></tr>
                        </table>

                    </div>

                </div>
            </div>
            <?php
        }
    }

}
