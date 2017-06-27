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
    $pages->pagefooter();
    
}

 else {
     $name=$_GET['page'];
//=================home page========================================================
     if($name=="home"){
      $title="home";
    $pages->pageheader($title);
    $pages->pagefooter();   
     }
//>>>>>>>>>>>>>>>>>>>>>>>>Tablets Page<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//==================returned tablet page===========================================
     elseif ($name=="returned") {
     $title="returned";
     $pages->pageheader($title);
     $pages->bodyleft();
     $pages->frmfield();
     $pages->bodyright();
     $processing->ntcbrd();
     $pages->pagefooter2();
       }
//======================Dispatch tablet page======================================
       elseif ($name=="Disp") {
       $title="Dispached";
     $pages->pageheader($title);
     $pages->dispform();
     $pages->pagefooter();
   }
//==================add returned tablet page=============================================
   elseif ($name=="add") {
        $title = "Success";
      $pages->pageheader($title);
      if(isset($_POST["sbt"])){
        $merchant=$_POST["merchant"];
        $sqcode=$_POST["sqcode"];
        $county=$_POST["county"];
        $retdate=$_POST["retdate"];
        $cond=$_POST["cond"];
        $issue=$_POST["issue"];
        if(!isset($_POST["sam"])){
          $sam="No"; 
        }
        else {
        $sam=$_POST["sam"];
        }
        $sql= "INSERT INTO returned (merchant,squidcode,county,rdate,tcond,tissue,sam)
                VALUES ('$merchant', '$sqcode', '$county', '$retdate', '$cond','$issue','$sam')";
         $processing->dbinsert($sql);
         header('Location: index.php?page=add');
      }   
}
//=====================view returned tablets page=================================
        elseif ($name=="ftabs") {
            $title="Faulty Tablets";
            $pages->pageheader($title);
            $pages->bodyleft();
            $tablets->Ftabview();
            $pages->bodyright();
            $processing->ntcbrd();
            $pages->pagefooter2();
            
        
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
