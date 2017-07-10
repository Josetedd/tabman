<?php
include 'collection.php';

$pages = new Pages();

$pages->pageheader("Delivery");
?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div>
                <button onclick="window.print()" class="btn btn-success notprint"><span class="fa fa-print">Print</span></button>
                
                   
                    
            </div>
            <div class="dnheader">
            <img src="images/dnheader.jpg"/>
            </div>
            <div class="table-responsive">
                <table class="table table-condensed table-bordered">
                    <tr><td>DN No:</td><td>School: Enoomatsiani primary</td><td>Date:</td></tr>
                    <tr><td colspan="3">Field officer:</td></tr>
                </table>
                <span>Please receive the undermentioned in good condition </span>
                <table class="table table-bordered meza">
                    <tr>
                        <th>#</th><th>Quantity</th><th>Specification/Description</th><th>Serial Number</th>
                    </tr>
                    <tr><td>1.</td><td>1 PC</td><td>iMlango attendance tablet</td><td>serial No here</td></tr>
                    <tr><td>2.</td><td></td><td></td><td></td></tr>
                    <tr><td>3.</td><td></td><td></td><td></td></tr>
                    <tr><td>4.</td><td></td><td></td><td></td></tr>
                    <tr><td>5.</td><td></td><td></td><td></td></tr>
                    <tr><td>6.</td><td></td><td></td><td></td></tr>
                </table>
            </div>
            <div class="col-md-6">
                    <table class="meza">
                        <tr><td>Delivered By:</td><td>____________________________</td></tr>
                        <tr><td>Designation:</td><td>____________________________</td></tr>
                        <tr><td>Signature:</td><td>____________________________</td></tr>
                        <tr><td>Date:</td><td>____________________________</td></tr>
                    </table>
                
            </div>
            <div class="col-md-6">
                    <table class="meza">
                        <tr><td>Received By:</td><td>____________________________</td></tr>
                        <tr><td>Designation:</td><td>____________________________</td></tr>
                        <tr><td>Signature:</td><td>____________________________</td></tr>
                        <tr><td>Date:</td><td>____________________________</td></tr>
                    </table>
                
            </div>
            </div>
        </div>
   


<?php
$pages->pagefooter();