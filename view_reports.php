<?php

include 'collection.php';

$pages = new Pages();
$report = new report();
if (!isset($_GET['page'])) {
    $title = "Reports Summary";
    $pages->pageheader($title);
    $pages->reportfilter();
    $pages->Dashreports();
    $pages->pagefooter();
} else {
    $page = $_GET['page'];
    if ($page == "filter") {
        $title = "Result";
        $pages->pageheader($title);
        $pages->reportfilter();
//==========get filter criteria================================================
        if (isset($_POST['sbt'])) {
//-------------------type-----------------------------------------------------
            if ($_POST['ttype'] == 1) {
                $ftype = "%";
            } elseif ($_POST['ttype'] == 2) {
                $ftype = "0";
            } elseif ($_POST['ttype'] == 3) {
                $ftype = "1";
            }
//---------------------dates---------------------------------------------------
            if (!isset($_POST['fdate'])) {
                $fdate = "14/5/2";
            } else {
                if ($_POST['fdate'] == "") {
                    $fdate = "14/5/2";
                } else {
                    $fdate = $_POST['fdate'];
                }
            }
            if (!isset($_POST['tdate'])) {
                $tdate = date('y/m/d');
            } else {
                if ($_POST['tdate'] == "") {
                    $tdate = date('y/m/d');
                } else {
                    $tdate = $_POST['tdate'];
                }
            }
//-----------------------counties-----------------------------------------------

            $county = $_POST['county'];
//-------------------------issues-----------------------------------------------
            $issue = $_POST['fiss'];
//--------------------run query-------------------------------------------------

            $report->rfilter($ftype, $fdate, $tdate, $county, $issue);
            
            $pages->pagefooter();

            //echo"you have selected type: $ftype from $fdate to $tdate in $county the issues are: $issue ";
        } else {
            header("location: view_reports.php");
        }
    } elseif ($page == "rdwnld") {
        if(isset($_POST['dwn'])){
            $query = $_POST['qqq'];
            $report->rdown($query);
        }
 else {
            echo 'how did i get here??';
 }
    }
}
