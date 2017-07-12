<?php
include 'collection.php';

$pages = new Pages();
$report = new report();
if(!isset($_GET['page'])){
    $title = "Reports Summary";
    $pages->pageheader($title);
    $pages->reportfilter();
    $pages->Dashreports();
    $pages->pagefooter();
}
 else{
    $page=$_GET['page'];
    if($page=="filter"){
//==========get filter criteria================================================
        if(isset($_POST['sbt'])){
            if(isset($_post[])||)
            echo ' i work';
        }
     
    }
    else{
        
    }
}
