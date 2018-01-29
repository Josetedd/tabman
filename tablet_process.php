<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tablet_process
 *
 * @author Joseph
 */
class tablet_process extends dbconn {
    //----------------process new tablet----------------------------------------
    public function newtabProcess($serial,$sqcode,$status){
        // check if tablet is already allocated
        $connection = $this->dbselect();
        $query = "select * from `terminals` where `imei`=$serial OR `Sticker_code` =$sqcode";
        $result = $connection->query($query);
        if (mysqli_num_rows($result) > 0) {
         echo '<div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Tablet with that serial number or squid Code already EXISTS!!</strong> 
                            </div>';
         
        } 
        else {
            $sql="INSERT INTO `terminals`(`imei`, `Sticker_code`, `Status`)"
                    . " VALUES('$serial','$sqcode','$status')";
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
    $this->showTablets();
        
    }
    public function showTablets(){
        $connection = $this->dbselect();
        $query = "select * from terminals";
        $result = $connection->query($query);
        ?>
        <div>
            <div>
            <a class="btn btn-info" href="tablet_view.php?page=new_tablet"><span class="fa fa-plus-square">Add new tablet</span></a>
            <!--<a class="btn btn-danger" href="tablet_view.php?page=faulty"><span class="fa fa-plus">Mark Faulty</span></a>-->
            <br/>
            <hr/>
            </div>
            <table class="table table-striped">
                <tr>
                    <td>Serial No</td><td>Squid Code</td><td>Status</td>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>
            <td>" . $row['imei'] . "</td><td>" . $row['Sticker_code'] . "</td><td>" . $row['Status'] . "</td>";
            //show Edit and Faulty button
                    //echo '<a class="btn btn-success btn-sm" href="tablet_view.php?page=edit_allocate&id=' . $id . '"><span class="fa fa-pencil">Edit<span></a>';
                    //echo '</td><td><a class="btn btn-danger btn-sm" href="tablet_view.php?page=disp&id=' . $id . '"><span class="fa fa-ban">Faulty<span></a>';
                    echo"</td></tr>";
                }
                ?>
            </table>
        </div>
        <?php 
    }
}
