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
    Total Faulty Tablets:<?php echo $num_row;?>
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
}