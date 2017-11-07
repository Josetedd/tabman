<?php

/**
 * This class contains all the methods of generating and displaying reports
 *
 * @author Joseph Mwangi
 */
class report extends dbconn {
    /*
     * this function generates a pie chart showing faulty tablets per county
     */
   public function incounty ($width, $height){
       $connection =$this->dbselect();
       $query = "SELECT * FROM `tabletallocation`";
        $query1 = "SELECT * FROM `tabletallocation` WHERE `county`='Kajiado'";
        $query2 = "SELECT * FROM `tabletallocation` WHERE `county`='Kilifi'";
        $query3 = "SELECT * FROM `tabletallocation` WHERE `county`='Makueni'";
        $query4 = "SELECT * FROM `tabletallocation` WHERE `county`='Uasin Gishu'";
        $result = $connection->query($query);
        $result1 = $connection->query($query1);
        $result2 = $connection->query($query2);
        $result3 = $connection->query($query3);
        $result4 = $connection->query($query4);
        $num_row = mysqli_num_rows($result);
        $num_row1 = mysqli_num_rows($result1);
        $num_row2 = mysqli_num_rows($result2);
        $num_row3 = mysqli_num_rows($result3);
        $num_row4 = mysqli_num_rows($result4);
//=======generate chart=========================================================
        ?>
        <div class="well">
            <div id="inCounty">
                chart here

            </div>
            Total:<span class="badge"><?php echo $num_row; ?></span>
        </div>
        <script>
            FusionCharts.ready(function () {
                var fcountyChart = new FusionCharts({
                    "type": "pie2d",
                    "renderAt": "inCounty",
                    "width": "<?php echo $width ?>",
                    "height": "<?php echo $height ?>",
                    "dataFormat": "json",
                    "dataSource": {
                        "chart": {
                            "caption": "Tablets in each county",
                           
                            "theme": "fint"
                        },
                        "data": [
                            {
                                "label": "Kajiado",
                                "value": "<?php echo $num_row1; ?>"
                            },
                            {
                                "label": "Kilifi",
                                "value": "<?php echo $num_row2; ?>"
                            },
                            {
                                "label": "Makueni",
                                "value": "<?php echo $num_row3; ?>"
                            },
                            {
                                "label": "Uasin Gishu",
                                "value": "<?php echo $num_row4; ?>"
                            }
                        ]
                    }
                });

                fcountyChart.render();
            })
        </script>
        <?php

       
   }

   //--------------------faulty tablet--------------------------------------------

    public function fCounty($width, $height) {
// =========get data from database========================        
        $connection = $this->dbselect();
        $query = "SELECT * FROM `returned`";
        $query1 = "SELECT * FROM `returned` WHERE `county`='Kajiado'";
        $query2 = "SELECT * FROM `returned` WHERE `county`='Kilifi'";
        $query3 = "SELECT * FROM `returned` WHERE `county`='Makueni'";
        $query4 = "SELECT * FROM `returned` WHERE `county`='Uasin Gishu'";
        $result = $connection->query($query);
        $result1 = $connection->query($query1);
        $result2 = $connection->query($query2);
        $result3 = $connection->query($query3);
        $result4 = $connection->query($query4);
        $num_row = mysqli_num_rows($result);
        $num_row1 = mysqli_num_rows($result1);
        $num_row2 = mysqli_num_rows($result2);
        $num_row3 = mysqli_num_rows($result3);
        $num_row4 = mysqli_num_rows($result4);
//=======generate chart=========================================================
        ?>
        <div class="well">
            <div id="fCounty">
                chart here

            </div>
            Total:<span class="badge"><?php echo $num_row; ?></span>
        </div>
        <script>
            FusionCharts.ready(function () {
                var fcountyChart = new FusionCharts({
                    "type": "pie2d",
                    "renderAt": "fCounty",
                    "width": "<?php echo $width ?>",
                    "height": "<?php echo $height ?>",
                    "dataFormat": "json",
                    "dataSource": {
                        "chart": {
                            "caption": "Faulty Tablets",
                            "subCaption": "in each county",
                            "theme": "fint"
                        },
                        "data": [
                            {
                                "label": "Kajiado",
                                "value": "<?php echo $num_row1; ?>"
                            },
                            {
                                "label": "Kilifi",
                                "value": "<?php echo $num_row2; ?>"
                            },
                            {
                                "label": "Makueni",
                                "value": "<?php echo $num_row3; ?>"
                            },
                            {
                                "label": "Uasin Gishu",
                                "value": "<?php echo $num_row4; ?>"
                            }
                        ]
                    }
                });

                fcountyChart.render();
            })
        </script>
        <?php
    }
// ----------------replaced tablets report---------------------------------------------------------------
    public function RCounty($width, $height) {
        $connection = $this->dbselect();
        $query = "SELECT * FROM `returned` WHERE `replaced`=1";
        $query1 = "SELECT * FROM `returned` WHERE `county`='Kajiado' AND `replaced`=1";
        $query2 = "SELECT * FROM `returned` WHERE `county`='Kilifi' AND `replaced`=1";
        $query3 = "SELECT * FROM `returned` WHERE `county`='Makueni' AND `replaced`=1";
        $query4 = "SELECT * FROM `returned` WHERE `county`='Uasin Gishu' AND `replaced`=1";
        $result = $connection->query($query);
        $result1 = $connection->query($query1);
        $result2 = $connection->query($query2);
        $result3 = $connection->query($query3);
        $result4 = $connection->query($query4);
        $num_row = mysqli_num_rows($result);
        $num_row1 = mysqli_num_rows($result1);
        $num_row2 = mysqli_num_rows($result2);
        $num_row3 = mysqli_num_rows($result3);
        $num_row4 = mysqli_num_rows($result4);
//=======generate chart using Fusion Charts=========================================================
        ?>
        <div class="well">
            <div id="rCounty">
                chart here

            </div>
            Replaced Tablets:<?php echo $num_row; ?>
        </div>
        <script>
            FusionCharts.ready(function () {
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
                                "value": "<?php echo $num_row1; ?>"
                            },
                            {
                                "label": "Kilifi",
                                "value": "<?php echo $num_row2; ?>"
                            },
                            {
                                "label": "Makueni",
                                "value": "<?php echo $num_row3; ?>"
                            },
                            {
                                "label": "Uasin Gishu",
                                "value": "<?php echo $num_row4; ?>"
                            }
                        ]
                    }
                });

                fcountyChart.render();
            })
        </script>
        <?php
    }

    public function catreport($width, $height) {
        $connection = $this->dbselect();
        $query = "select * from categories";
        $result = $connection->query($query);
        $issueCount = mysqli_num_rows($result);
        ?>
        <div class="well">
            <div id="catreport">
                chart here

            </div>
            <span>Number of issues: <?php echo $issueCount; ?></span>
        </div>
        <script type="text/javascript">
            FusionCharts.ready(function () {
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
        while ($row = mysqli_fetch_array($result)) {

            $query2 = "select * from `returned` where `tissue`='" . $row['category'] . "'";
            $result2 = $connection->query($query2);
            $numCount = mysqli_num_rows($result2);
            $chartData = '{
"label": "' . $row['category'] . '",
"value": "' . $numCount . '"
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

    /*
     * This function is used to retrieve search result based on criteria specified in the report filter
     */

    public function rfilter($ftype, $fdate, $tdate, $county, $issue) {
//----------get data from db------------------------------------------
        $connection = $this->dbselect();
        $query = "SELECT * FROM `returned` WHERE`replaced` LIKE '" . $ftype .
                "' AND `rdate` BETWEEN '" . $fdate . "' AND '" . $tdate .
                "' and `county` LIKE '" . $county .
                "' and `tissue` LIKE '" . $issue . "'";
        $result = $connection->query($query);
        $numrow = mysqli_num_rows($result);
//----------------display the result--------------------------------------
        if ($numrow == 0) {
            echo 'no resulty found!';
        } else {
            ?>
            <div>
                <h1 style="text-align: center">Filter Results</h1>
                <button onclick="exportTableToCSV('Results.csv')" class="btn btn-info fa fa-download" name='dwn'>Download</button>
                <input type="text" name='qqq' hidden value="<?php echo $query; ?>"/>
                <table class="table table-striped">
                    <thead><tr>
                            <th>School</th><th>County</th><th>Squid Code</th><th>Issue</th><th>With SAM?</th><th>Returned On</th>
                        </tr></thead>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {

                        $id = $row['tabId'];

                        echo "<tr>
            <td>" . $row['merchant'] . "</td><td>" . $row['county'] . "</td><td>" . $row['squidcode'] . "</td><td>" . $row['tissue'] . "</td><td>" . $row['sam'] . "</td><td>" . $row['rdate'] . "</td>
        <td></tr>";
                    }
                    ?>
                </table>

            </div>
            <!---------------------------------------Export csv script-------------------------------------------------->
            <script>
                function exportTableToCSV(filename) {
                    var csv = [];
                    var rows = document.querySelectorAll("table tr");

                    for (var i = 0; i < rows.length; i++) {
                        var row = [], cols = rows[i].querySelectorAll("td, th");

                        for (var j = 0; j < cols.length; j++)
                            row.push(cols[j].innerText);

                        csv.push(row.join(","));
                    }

                    // Download CSV file
                    downloadCSV(csv.join("\n"), filename);
                }

            </script>
            <!---------------------------------------download csv script (from: https://www.codexworld.com/export-html-table-data-to-csv-using-javascript/)------------------------------------------------->
            <script>
                function downloadCSV(csv, filename) {
                    var csvFile;
                    var downloadLink;

                    // CSV file
                    csvFile = new Blob([csv], {type: "text/csv"});

                    // Download link
                    downloadLink = document.createElement("a");

                    // File name
                    downloadLink.download = filename;

                    // Create a link to the file
                    downloadLink.href = window.URL.createObjectURL(csvFile);

                    // Hide download link
                    downloadLink.style.display = "none";

                    // Add the link to DOM
                    document.body.appendChild(downloadLink);

                    // Click download link
                    downloadLink.click();
                }
            </script>
            <!----------------------------------------------------------------------------------------------------------->
            <?php
        }
    }

}
