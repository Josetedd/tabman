<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tablets
 *
 * @author dell
 */
class Tablets extends dbconn{
    //======================**view all tablets**================================
    function Ftabview(){
        $connection= $this->dbselect();
        $query = "select * from returned";
        $result= $connection->query($query);
        ?>
<div>
    <h1 style="text-align: center">Faulty Tablets</h1>
    <a class="btn btn-danger" href="index.php?page=returned"><span class="fa fa-plus">Add Faulty Tablet</span></a>
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
                echo '<a class="btn btn-success" href="index.php?page=disp&id='.$id.'"><span class="fa fa-refresh">replace<span></a>';
            }
            
        echo"</td></tr>";
         
         
            
        }
?>
    </table>
</div>
<?php
    }
    function tabrep($tabid){
        $connection= $this->dbselect();
        $query="select * from `returned` where `tabId`=$tabid";
        $result=$connection->query($query);
        if(mysqli_num_rows($result)==1){
            $row=  mysqli_fetch_array($result);
            
  //==================================replacement form================================================
 ?>
  <div class="row">
         <form class="form-horizontal" action="">
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
          <input type="text" class="form-control" name="rcode">
      </div>
         </div>
             <div class="form-group"> 
      <label class="control-label col-md-3" for="rime">IMEI1:</label>
      <div class="col-md-9">          
          <input type="text" class="form-control" name="rime">
      </div>
         </div>
        <div class="form-group">
            <div class="col-md-offset-4">
      <button type="submit" class="btn btn-default">Save & generate Delivery</button>
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
}
