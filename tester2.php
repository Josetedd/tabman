<?php
include 'collection.php';

$pages= new Pages();
$report = new report();

$pages->pageheader("tester 2");

?>

<?php
$report->fCounty();
$pages->pagefooter();

