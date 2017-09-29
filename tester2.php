<?php
include 'collection.php';

$pages= new Pages();
$report = new report();
$tablets = new Tablets();

$pages->pageheader("tester 2");
//$school ="Kamawe";
$id = 1;
$tablets->fsearch();
//$tablets->fsearchresults($school);
//$tablets->markFaulty($id);
$pages->pagefooter();

