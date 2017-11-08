<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Merchant
 *
 * @author Joseph
 */
class Merchant extends dbconn {
    //get list of schools/ merchants
    public function getSchools(){
        $connect = $this->dbselect();
        $query = "select * from schools";
        //get matched data
        $result = $connect->query($query);
 
        mysqli_close($connect);
    }
}
