<?php
//main loadinng page
// author: Joseph Mwangi
include 'collection.php';
$pages = new Pages();
    $processing = new Processing();
    $category = new Category();
    $tablets =new Tablets();
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
//>>>>>>>>>>>>>>>>>>>>>>Category Pages<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//===================add category page===================================================
elseif ($name=="addcat") {
    $title="New Category";
    $pages->pageheader($title);
    $pages->Addcat();
    $pages->pagefooter();

}
//======================save category page============================================
elseif ($name=="savecat") {
    $title="success";
    $pages->pageheader($title);
    if(isset($_POST["sbt"])){
        $catName=$_POST['CatName'];
        $category->savecat($catName);
    }
    elseif (isset ($_POST["updt"])) {
        if(!isset($_POST['CatName'])){
            echo 'No change made';  
        }
        else{
     $catName=$_POST['CatName'];
     $catID=$_POST['catid'];
     //echo $catId;
     $category->catupdt($catName, $catID);
        }
}
    $pages->pagefooter();

}
//============================= View Categories page=====================================
        elseif ($name=="categories") {
        $title="Categories";
        $pages->pageheader($title);
        //$pages->bodyright();
        
        $category->catget();
        //$pages->bodyleft();
        $pages->pagefooter();
    }
    elseif ($name=="cated") {
    $title="Edit Category";
    $pages->pageheader($title);
    if(isset($_GET['id'])&& is_numeric($_GET['id'])){
        $id= $_GET['id'];
     $category->editcat($id);
      
    }
 else {
        echo 'No Category selected';
    }
        //$pages->bodyleft();
        $pages->pagefooter();
}

}
