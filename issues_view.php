<?php
//main loadinng page
// author: Joseph Mwangi
include 'collection.php';
$pages = new Pages();
    $processing = new Processing();
    $category = new Issues();
//==============check if page name is set============================================
if(!isset($_GET['page'])){// if not set show home page
    $title = "Issues";
         $pages->pageheader($title);
         $category->catget();
         $pages->pagefooter();
}

 else {
     $name=$_GET['page'];
//=================Edit issues========================================================
     if($name=="edit"){
      $title="Edit Issues";
    $pages->pageheader($title);
    if(isset($_GET['id'])&& is_numeric($_GET['id'])){
        $id= $_GET['id'];
     $category->editcat($id);   
     }

 }
 //======================save issue page============================================
elseif ($name=="save") {
    $title="success";
    $pages->pageheader($title);
    if(isset($_POST["sbt"])){
        $catName=$_POST['CatName'];
        $category->savecat($catName);
        $category->catget();
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
//---------------add issue
elseif ($name=="add") {
    $title="New Issue";
    $pages->pageheader($title);
    $pages->Addcat();
    $pages->pagefooter();

}
 }
 
