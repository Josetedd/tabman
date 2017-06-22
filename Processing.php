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

    public function Retview(){
        
    }
//==============default notice board information================================
    public function ntcbrd(){
        $connection=$this->dbselect();
        
        
        
?>

<dl>
    <dt>Schools: 205</dt>
    <dd>>>Kajiado County: 26</dd>
    <dd>>>Kilifi County: 80</dd>
    <dd>>>Makueni County: 37</dd>
    <dd>>>Uasin Gishu County: 62</dd>
    <dt>Total Faulty Tablets:</dt>
    <dd>**Faulty Tablets From Kajiado:</dd>
    <dd>**Faulty Tablets From Kilifi:</dd>
    <dd>**Faulty Tablets From Makueni:</dd>
    <dd>**Faulty Tablets From Uasin Gishu:</dd>
   
</dl>
<?php
    }

}


