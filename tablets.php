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
    <a class="btn btn-info" href="index.php?page=returned"><span class="fa fa-plus">Add Faulty Tablet</span></a>
    <a class="btn btn-info" href="#"><span class="fa fa-plus-square">Replace Tablet</span></a>
    <br/>
    <table class="table table-striped">
        <tr>
            <td>School</td><td>County</td><td>Issue</td><td>Squid Code</td><td>returned on</td>
        </tr>
<?php
        while ($row = mysqli_fetch_array($result)) {
            
            echo "<tr>
            <td>".$row['merchant']."</td><td>".$row['county']."</td><td>".$row['tissue']."</td><td>".$row['squidcode']."</td><td>".$row['rdate']."</td>
        </tr>";
         
         
            
        }
?>
    </table>
</div>
<?php
    }
}
