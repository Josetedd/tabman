<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Funnctions for connecting to DB
 *
 * @author Joseph Mwangi
 */
class dbconn {
    public function dbselect(){
        $dbName = 'tabman' ;
    $dbHost = 'localhost' ;
    $dbUsername = 'root';
    $dbUserPassword = '';
    $connect= new mysqli($dbHost, $dbUsername, $dbUserPassword);
//---------check connection--------------------------------------------
    if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
 else {
    mysqli_select_db($connect, $dbName);
    return $connect;
}
}
//==============================================================================
    public function dbinsert($sql){
        $connection= $this->dbselect();
        if(mysqli_query($connection,$sql)){
            
            echo '<div class="alert alert-success alert-dismissable">Data saved</div>';
        }
        else {
            echo '<div class="alert alert-danger alert-dismissable">Data not Saved contact Admin</div>';
        }
       
        
   }
}

