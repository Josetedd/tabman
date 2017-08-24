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
     //=====================Tablet Allocation===================================
     //---------------------show new tablet form--------------------------------
     elseif ($name=="new_tablet") {
     $title ="New Tablet";
     $pages->pageheader($title);
     $tablets->allocateTab();
     $pages->pagefooter();
     if(isset($_POST['sbt'])){
         echo 'am good';
     }
     }
     //----------------------process new tablet----------------------------------
     elseif ($name=="allocate") {
         $title = "New Tablet";
        $pages->pageheader($title);
        if(isset($_POST['sbt'])){
            $serial = $_POST['serial'];
            $sqcode = $_POST['sqcode'];
            $school = $_POST['merchant'];
            $county = $_POST['county'];
            if(!isset($_POST['sam'])){
                $sam = 0;
            }
            else {
                $sam = 1;
            }
            $tablets->newtabProcess($serial, $sqcode, $school, $county, $sam);
        
           
        }
 }
 //==================tablet replacement=========================================
    //------------------ tablet replacement page======================================
       elseif ($name=="disp") {
       $title="replace";
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
 //-----------------process/ add replaced tablet--------------------------------
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
 }