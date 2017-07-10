<?php

/*
 * This class contains all methods for adding, viewing, updating tablet records
 */

/**
 * @author Joseph Mwangi
 *
 */
class Tablets extends dbconn{
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
    //======================**view Faulty tablets**================================
    function Ftabview(){
        $connection= $this->dbselect();
        $query = "select * from returned ORDER BY replaced ASC, rdate DESC";
        $result= $connection->query($query);
        ?>
<div>
    <h1 style="text-align: center">Faulty Tablets</h1>
    <a class="btn btn-danger" href="index.php?page=faulty"><span class="fa fa-plus">Add Faulty Tablet</span></a>
    <a class="btn btn-info" href="#"><span class="fa fa-plus-square">Add extra tablet</span></a>
    <br/>
    <table class="table table-striped">
        <tr>
            <td>School</td><td>County</td><td>Issue</td><td>Squid Code</td><td>returned on</td>
        </tr>
<?php
        while ($row = mysqli_fetch_array($result)) {
            $id=$row['tabId'];
            echo "<tr>
            <td>".$row['merchant']."</td><td>".$row['county']."</td><td>".$row['tissue']."</td><td>".$row['squidcode']."</td><td>".$row['rdate']."</td>
        <td>";
//show replace button if not replaced and replace if replaced
            if($row['replaced']==0){
                echo '<a class="btn btn-success btn-sm" href="index.php?page=disp&id='.$id.'"><span class="fa fa-refresh">replace<span></a>';
            }
            else{
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
    function tabrep($tabid){
        $connection= $this->dbselect();
        $query="select * from `returned` where `tabId`=$tabid";
        $result=$connection->query($query);
        if(mysqli_num_rows($result)==1){
            $row=  mysqli_fetch_array($result);
            
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
            
        }
         else {
             echo 'no Faulty tablet selected';
             $this->Ftabview();
             
         }
        
    }
    //=============================view Replaced tablets============================
    function tabview(){
        $connection= $this->dbselect();
        $query = "select * from replaced";
        $result= $connection->query($query);
        ?>
<div>
    <h1 style="text-align: center">Replaced Tablets</h1>
    <a class="btn btn-primary" href="index.php?page=ftabs"><span class="fa fa-eye">View Faulty Tablets</span></a>
    <a class="btn btn-info" href="#"><span class="fa fa-plus-square">Add extra tablet</span></a>
     <a class="btn btn-danger" href="index.php?page=faulty"><span class="fa fa-eye">Add Faulty Tablets</span></a>
    <br/>
    <table class="table table-striped">
        <tr>
            <td>School</td><td>Imei</td><td>Squid Code</td><td>Sam</td><td>replaced on</td>
        </tr>
<?php
        while ($row = mysqli_fetch_array($result)) {
            
            $id=$row['repId'];
            if($row['sam']==1){
                $sam="Yes";
            }
            else {
                $sam="No";
            }
            echo "<tr>
            <td>".$row['school']."</td><td>".$row['imei1']."</td><td>".$row['sqcode']."</td><td>".$sam."</td><td>".$row['rdate']."</td>
        <td>";
//show View Delivery Note
             echo '<a class="btn btn-success" href="index.php?page=dnote&id='.$id.'"><span class="fa fa-file-pdf-o">Delivery Note<span></a>';
        echo"</td></tr>";
         
         
            
        }
?>
    </table>
</div>
<?php
    }
    //================================insert replace tablet data====================================
    public function Repadd($sql1,$sql2){
        $connection= $this->dbselect();
        if(mysqli_query($connection, $sql1)){
            if(mysqli_query($connection, $sql2)){
                echo 'Data successfully Saved';
            }
        }
        else {
                echo 'Data not saved contact Admin';
              
        }
    }
//============================Print Delivery Note==================================================
    public function dNote($tabid){
         $connection= $this->dbselect();
        $query="select * from `replaced` where `repId`=$tabid";
        $result=$connection->query($query);
        if(mysqli_num_rows($result)==1){
            $row=  mysqli_fetch_array($result);
?>
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div>
                <button onclick="window.print()" class="btn btn-success notprint"><span class="fa fa-print">Print</span></button>
                
                   
                    
            </div>
            <div class="dnheader">
            <img src="images/dnheader.jpg"/>
            </div>
            <div class="table-responsive">
                <table class="table table-condensed table-bordered">
                    <tr><td>DN No:<?php echo $tabid;?></td><td>School: <?php echo $row['school'];?></td><td>Date:<?php echo $row['rdate'];?></td></tr>
                    <tr><td colspan="3">Field officer:</td></tr>
                </table>
                <span>Please receive the undermentioned in good condition </span>
                <table class="table table-bordered meza">
                    <tr>
                        <th>#</th><th>Quantity</th><th>Specification/Description</th><th>Serial Number</th>
                    </tr>
                    <tr><td>1.</td><td>1 PC</td><td>iMlango attendance tablet</td><td><?php echo $row['imei1'];?></td></tr>
                    <tr><td>2.</td><td></td><td></td><td></td></tr>
                    <tr><td>3.</td><td></td><td></td><td></td></tr>
                    <tr><td>4.</td><td></td><td></td><td></td></tr>
                    <tr><td>5.</td><td></td><td></td><td></td></tr>
                    <tr><td>6.</td><td></td><td></td><td></td></tr>
                </table>
            </div>
            <div>
                    <table class="meza">
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
