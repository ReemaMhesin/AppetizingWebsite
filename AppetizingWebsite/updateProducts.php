<?php


try {
    $db = new mysqli('localhost', 'root', '', 'graduationjawna');
    $qryStr = "SELECT * FROM admin";
    $res = $db->query($qryStr);

    $dataPoints = array();
    for ($i = 0; $i < $res->num_rows; $i++) {
        $row = $res->fetch_object();

            $dataPoints[] = array("label" => "$row->AdminName", "y" => $row->NumberSales);

    }
    $db->commit();
    $db->close();
}catch(Exception $e){

}






?>
<!DOCTYPE HTML>
<html>
<head>
    <style>

        body{
            background: linear-gradient( yellowgreen 10%, yellowgreen 30%,white 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .img5{
            position: absolute;
            border-radius: 100%;
            left: 20px;
            top: 20px;
        }




    </style>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                //theme: "light2",
                title:{
                    text: "Number of Sales each Market"
                },
                axisX:{
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY:{
                    title: "# Sales",
                    includeZero: true,
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                toolTip:{
                    enabled: false
                },
                data: [{
                    type: "area",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>
<a href="homePage.php">

    <img class="img5"  height="50px" width="50px" src="assets/img/back.png" >
</a>
<div id="chartContainer" style=" position:absolute; top:200px;left:150px;height: 370px; width: 80%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

