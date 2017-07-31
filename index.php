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
//>>>>>>>>>>>>>>>>>>>>>>>>Tablets Page<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        elseif ($name=="repadd") {
        $title="tablet replaced";
        $pages->pageheader($title);
        if(isset($_POST['sbt'])){
            $school=$_POST['fschl'];
            $imei=$_POST['rime'];
            $rcode=$_POST['rcode'];
            $rtype="replaced";
            if(!isset($_POST['rsam'])){
                $rsam="0";
            }
            else{
            $rsam="1";
            }
            
            $tabid=$_POST['tabid'];
            $sql2="UPDATE returned SET replaced=1 WHERE tabId=$tabid";
            $sql1="INSERT INTO replaced (school,imei1,sqcode,rtype,sam,rdate)
                VALUES ('$school', '$imei', '$rcode', '$rsam','$rtype', now()) ";
            $tablets->Repadd($sql1, $sql2);
            
        }
    }
//====================View dispached/replaced tablets===========================
        elseif ($name=="replaced") {
        $title ="Replaced tablets";
        $pages->pageheader($title);
            $pages->bodyleft();
            $tablets->tabview();
            $pages->bodyright();
            $processing->ntcbrd();
            $pages->pagefooter2();
    }
//==================Faulty tablet page===========================================
     elseif ($name=="faulty") {
     $title="Add Faulty";
     $pages->pageheader($title);
     $pages->bodyleft();
     $tablets->frmfield();
     $pages->bodyright();
     $processing->ntcbrd();
     $pages->pagefooter2();
       }
//======================Dispatch tablet page======================================
       elseif ($name=="disp") {
       $title="Dispach";
     $pages->pageheader($title);
     if(isset($_GET['id'])){
         $tabid=$_GET['id'];
     $tablets->tabrep($tabid);
     }
     else{
         echo 'No Faulty Tablet Selected';
     }
     $pages->pagefooter();
   }
//==================add Faulty tablet page=============================================
   elseif ($name=="add") {
        $title = "Success";
      $pages->pageheader($title);
      if(isset($_POST["sbt"])){
        $merchant=$_POST["merchant"];
        $sqcode=$_POST["sqcode"];
        $county=$_POST["county"];
        $retdate=$_POST["retdate"];
        //$cond=$_POST["cond"];
        $issue=$_POST["issue"];
        if(!isset($_POST["sam"])){
          $sam="No"; 
        }
        else {
        $sam=$_POST["sam"];
        }
        $sql= "INSERT INTO returned (merchant,squidcode,county,rdate,tissue,sam)
                VALUES ('$merchant', '$sqcode', '$county', '$retdate','$issue','$sam')";
         $processing->dbinsert($sql);
         $tablets->Ftabview();
      }   
}
//=====================view Faulty tablets page=================================
        elseif ($name=="ftabs") {
            $title="Faulty Tablets";
            $pages->pageheader($title);
            $pages->bodyleft();
            $tablets->Ftabview();
            $pages->bodyright();
            $processing->ntcbrd();
            $pages->pagefooter2();
            
        
    }
//========================Generate Delivery=====================================
        elseif ($name=="dnote") {
            $title="Delivery Note";
            $pages->pageheader($title);
            if(!isset($_GET['id'])){
                echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>No Tablet Selected!</strong> Select from the list below.
</div>';
                $tablets->tabview();
                $pages->bodyright();
                $processing->ntcbrd();
                $pages->pagefooter2();
            }
            else {
                $tabid=$_GET['id'];
                $tablets->dNote($tabid);
                $pages->pagefooter();
            }
        
    }
//>>>>>>>>>>>>>>>>>>>>>>Category Pages<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
//===================add category page===================================================
elseif ($name=="addcat") {
    $title="New Category";
    $pages->pageheader($title);
    $category->Addcat();
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
