<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Processing
 *
 * @author dell
 */
class Processing extends dbconn {

//==============default notice board information================================
    public function ntcbrd() {
        $connection = $this->dbselect();
        $query1 = "SELECT * FROM `returned` WHERE `county`='Kajiado'";
        $query2 = "SELECT * FROM `returned` WHERE `county`='Kilifi'";
        $query3 = "SELECT * FROM `returned` WHERE `county`='Makueni'";
        $query4 = "SELECT * FROM `returned` WHERE `county`='Uasin Gishu'";
        $result1 = $connection->query($query1);
        $result2 = $connection->query($query2);
        $result3 = $connection->query($query3);
        $result4 = $connection->query($query4);
        $num_row1 = mysqli_num_rows($result1);
        $num_row2 = mysqli_num_rows($result2);
        $num_row3 = mysqli_num_rows($result3);
        $num_row4 = mysqli_num_rows($result4);
        ?>

        <dl>
            <dt>Schools: 205</dt>
            <dd>>>Kajiado County: 26</dd>
            <dd>>>Kilifi County: 80</dd>
            <dd>>>Makueni County: 37</dd>
            <dd>>>Uasin Gishu County: 62</dd>
            <dt>Total Faulty Tablets:</dt>
            <dd>**Faulty Tablets From Kajiado:<?php echo $num_row1 ?></dd>
            <dd>**Faulty Tablets From Kilifi:<?php echo $num_row2 ?></dd>
            <dd>**Faulty Tablets From Makueni:<?php echo $num_row3 ?></dd>
            <dd>**Faulty Tablets From Uasin Gishu:<?php echo $num_row4 ?></dd>

        </dl>
        <?php
    }

}
