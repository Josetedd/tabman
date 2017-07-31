<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of report
 *
 * @author dell
 */
class report extends dbconn {
    private $theQuery;
    public function fCounty($width, $height){
        $connection = $this->dbselect();
        $query="SELECT * FROM `returned`";
        $query1 ="SELECT * FROM `returned` WHERE `county`='Kajiado'";
        $query2 ="SELECT * FROM `returned` WHERE `county`='Kilifi'";
        $query3 ="SELECT * FROM `returned` WHERE `county`='Makueni'";
        $query4 ="SELECT * FROM `returned` WHERE `county`='Uasin Gishu'";
        $result=$connection->query($query);
        $result1=$connection->query($query1);
        $result2=$connection->query($query2);
        $result3=$connection->query($query3);
        $result4=$connection->query($query4);
        $num_row= mysqli_num_rows($result);
        $num_row1= mysqli_num_rows($result1);
        $num_row2= mysqli_num_rows($result2);
        $num_row3= mysqli_num_rows($result3);
        $num_row4= mysqli_num_rows($result4);
//=======generate chart=========================================================
?>
<div class="well">
<div id="fCounty">
    chart here
    
</div>
    Total Replaced Tablets:<?php echo $num_row;?>
</div>
<script>
    FusionCharts.ready(function(){
      var fcountyChart = new FusionCharts({
        "type": "pie2d",
        "renderAt": "fCounty",
        "width": "<?php echo $width ?>",
        "height": "<?php echo $height ?>",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Total Faulty Tablets",
             "subCaption": "in each county",
              "theme": "fint"
           },
          "data": [
              {
                 "label": "Kajiado",
                 "value": "<?php echo $num_row1;?>"
              },
              {
                 "label": "Kilifi",
                 "value": "<?php echo $num_row2;?>"
              },
              {
                 "label": "Makueni",
                 "value": "<?php echo $num_row3;?>"
              },
              {
                 "label": "Uasin Gishu",
                 "value": "<?php echo $num_row4;?>"
              }
           ]
        }
    });

    fcountyChart.render();
})
</script>
<?php
    }
    public function RCounty($width, $height){
        $connection = $this->dbselect();
        $query="SELECT * FROM `returned` WHERE `replaced`=1";
        $query1 ="SELECT * FROM `returned` WHERE `county`='Kajiado' AND `replaced`=1";
        $query2 ="SELECT * FROM `returned` WHERE `county`='Kilifi' AND `replaced`=1";
        $query3 ="SELECT * FROM `returned` WHERE `county`='Makueni' AND `replaced`=1";
        $query4 ="SELECT * FROM `returned` WHERE `county`='Uasin Gishu' AND `replaced`=1";
        $result=$connection->query($query);
        $result1=$connection->query($query1);
        $result2=$connection->query($query2);
        $result3=$connection->query($query3);
        $result4=$connection->query($query4);
        $num_row= mysqli_num_rows($result);
        $num_row1= mysqli_num_rows($result1);
        $num_row2= mysqli_num_rows($result2);
        $num_row3= mysqli_num_rows($result3);
        $num_row4= mysqli_num_rows($result4);
//=======generate chart=========================================================
?>
<div class="well">
<div id="rCounty">
    chart here
    
</div>
    Total Faulty Tablets:<?php echo $num_row;?>
</div>
<script>
    FusionCharts.ready(function(){
      var fcountyChart = new FusionCharts({
        "type": "column2d",
        "renderAt": "rCounty",
        "width": "<?php echo $width ?>",
        "height": "<?php echo $height ?>",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Total Faulty Tablets",
             "subCaption": "in each county",
              "theme": "fint"
           },
          "data": [
              {
                 "label": "Kajiado",
                 "value": "<?php echo $num_row1;?>"
              },
              {
                 "label": "Kilifi",
                 "value": "<?php echo $num_row2;?>"
              },
              {
                 "label": "Makueni",
                 "value": "<?php echo $num_row3;?>"
              },
              {
                 "label": "Uasin Gishu",
                 "value": "<?php echo $num_row4;?>"
              }
           ]
        }
    });

    fcountyChart.render();
})
</script>
<?php
    }
    public function catreport($width, $height){
        $connection=  $this->dbselect();
        $query="select * from categories";
        $result=$connection->query($query);
        $issueCount=  mysqli_num_rows($result);
       
?>
<div class="well">
<div id="catreport">
    chart here
    
</div>
    <span>Number of issues: <?php echo $issueCount;    ?></span>
</div>
<script type="text/javascript">
  FusionCharts.ready(function(){
    var fusioncharts = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'catreport',
    width: '<?php echo $width ?>',
    height: '<?php echo $height; ?>',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Split of Faulty Tablets",
            "subCaption": "by Issues",
            "showBorder": "0",
            "use3DLighting": "0",
            "enableSmartLabels": "0",
            "startingAngle": "310",
            "showLabels": "0",
            "showPercentValues": "1",
            "showLegend": "1",
            "defaultCenterLabel": "Total revenue: $64.08K",
            "centerLabel": "Revenue from $label: $value",
            "centerLabelBold": "1",
            "showTooltip": "0",
            "decimals": "0",
            "useDataPlotColorForLabels": "1",
            "theme": "fint"
        },
        "data": [
            <?php 
             while($row=  mysqli_fetch_array($result)){
            
            $query2="select * from `returned` where `tissue`='".$row['category']."'";
            $result2=$connection->query($query2);
            $numCount=  mysqli_num_rows($result2);
            $chartData= '{
            "label": "'.$row['category'].'",
            "value": "'.$numCount.'"
        },';
            echo $chartData;
        }
             ?>
        ]
    }
}
);
    fusioncharts.render();
});
</script>
<?php
    }
//+++++++++++++++++++++++++====filter======+++++++++++++++++++++++++++++++++++
    public function rfilter($ftype,$fdate,$tdate,$county,$issue){
        
        $rquery="SELECT * FROM `returned` WHERE`replaced` LIKE '".$ftype.
                "' AND `rdate` BETWEEN '".$fdate."' AND '".$tdate.
                "' and `county` LIKE '".$county.
                "' and `tissue` LIKE '".$issue."'";
        $this->theQuery=$rquery;
        //echo $this->theQuery;
        //return $rquery;
    }
    
    public function showresult(){
//----------get data from db------------------------------------------
        $connection = $this->dbselect();
        $query = $this->theQuery;
        $result= $connection->query($query) ;
        $numrow=  mysqli_num_rows($result);
        if($numrow==0){
            echo 'no resulty found!';
        }
        else{
 ?>
<div>
    <h1 style="text-align: center">Filter Results</h1>
    <a class="btn btn-info">Download</a>
    <table class="table table-striped">
        <thead><tr>
            <th>School</th><th>County</th><th>Squid Code</th><th>Issue</th><th>With SAM?</th><th>Returned On</th>
            </tr></thead>
<?php
while ($row = mysqli_fetch_array($result)) {
            
            $id=$row['tabId'];
           
            echo "<tr>
            <td>".$row['merchant']."</td><td>".$row['county']."</td><td>".$row['squidcode']."</td><td>".$row['tissue']."</td><td>".$row['sam']."</td><td>".$row['rdate']."</td>
        <td></tr>";
    }
?>
    </table>
<?php
        }
       
    }
    public function rdown(){
        echo $this->theQuery;
    }
  
    
    
}
