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
    public function fCounty(){
        $connection = $this->dbselect();
        $query1 ="SELECT * FROM `returned` WHERE `county`='Kajiado'";
        $query2 ="SELECT * FROM `returned` WHERE `county`='Kilifi'";
        $query3 ="SELECT * FROM `returned` WHERE `county`='Makueni'";
        $query4 ="SELECT * FROM `returned` WHERE `county`='Uasin Gishu'";
        $result1=$connection->query($query1);
        $result2=$connection->query($query2);
        $result3=$connection->query($query3);
        $result4=$connection->query($query4);
        $num_row1= mysqli_num_rows($result1);
        $num_row2= mysqli_num_rows($result2);
        $num_row3= mysqli_num_rows($result3);
        $num_row4= mysqli_num_rows($result4);
//=======generate chart=========================================================
?>
<div id="fCounty">
    chart here
    
</div>
<script>
    FusionCharts.ready(function(){
      var fcountyChart = new FusionCharts({
        "type": "pie2d",
        "renderAt": "fCounty",
        "width": "500",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Total Faulty Tablets",
              "subCaption": "in each county",
              "xAxisName": "County",
              "yAxisName": "Tableet Count",
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
