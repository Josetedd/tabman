<?php
//main loadinng page
// author: Joseph Mwangi
include 'collection.php';
$pages = new Pages();
    $processing = new Processing();
    $category = new Category();
//==============check if page name is set============================================
if(!isset($_GET['page'])){// if not set show home page
    $title="home";
    $pages->pageheader($title);
    $pages->Dashmenu();
    $pages->Dashreports();
    $pages->pagefooter();
    
}

 else {
     $name=$_GET['page'];
//=================home page========================================================
     if($name=="home"){
      $title="home";
    $pages->pageheader($title);
    $pages->Dashmenu();
    $pages->Dashreports();
    $pages->pagefooter();   
     }
//>>>>>>>>>>>>>>>>>>>>>>>>Categories pages<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
     //---------------------show show category--------------------------------
     elseif ($name=="show") {
         $title = "Schools/Merchants";
         $pages->pageheader($title);
         $category->catget();
         $pages->pagefooter();
     
 }
 }
