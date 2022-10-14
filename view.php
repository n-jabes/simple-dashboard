<?php
    // connection with the database
    $con = mysqli_connect('localhost', 'root', '', 'display_data_embedded');

    $dataPointsGraph = [];

    $sel = "SELECT * FROM iot";
    $query = $con->query($sel);
    
    while($row=$query->fetch_assoc()){
        array_push($dataPointsGraph,array("y"=>$row['temperature'],"symbol"=>$row['no'],"label"=>$row['name']));
    }

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./styles.css">
    <title>3D</title>

    <script>
        window.onload = function() {
        
        let graphChart = new CanvasJS.Chart("graphDiagram", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Weekly analysis"
            },
            axisY: {
                title: "Temperature (°C)"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## °C",
                dataPoints: <?php echo json_encode($dataPointsGraph, JSON_NUMERIC_CHECK); ?>
            }]
        });

        let pieChart = new CanvasJS.Chart("chartPie", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Temperatures"
            },
            data: [{
                type: "doughnut",
                indexLabel: "{symbol} - {y}",
                yValueFormatString: "#,##0.0\"%\"",
                showInLegend: true,
                legendText: "{label} : {y}",
                dataPoints: <?php echo json_encode($dataPointsGraph, JSON_NUMERIC_CHECK); ?>
            }]
        });

        graphChart.render();
        pieChart.render();
        
        }
    </script>
</head>
<body>
    <div class="mainContainer" >
        <div class="sidebar">
           <h1 class="logo">IoT</h1>
           <div class="hr"></div>
           <ul>
            <li class="nav" id="devices">All Devices</li>
            <li class="nav" id="analysis">Weekly analysis</li>
            <li class="nav" id="temp">Temperatures</li>
           </ul>
        </div>
        <div class="main">
            <div class="navbar">
                <div class="search">
                    <input type="text" placeholder="Search">
                </div>
                <div class="profile">
                    <span>Notifications</span>
                    <span>Profile</span>
                </div>
            </div>
            <div class="presentation">
                <div class="chart page" id="chart">
                    <div id="chartPie"></div>
                </div>
                <div class="graph page" id="graph">
                    <div id='graphDiagram'></div>
                </div>
                <div class="tablepage page" id="tablepage">
                    <h2>Displaying statistics for All  Devices</h2>
                    <div class="tableContainer">
                        <table class="table table-border"> 
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>name</th>
                                    <th>Temperature (°C)</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $select = "SELECT * FROM iot";
                                    $selQuery = $con->query($select);
                                    while($row=$selQuery->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $row['no']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['temperature']?></td>
                                    <td><?php echo $row['created_at']?></td>
                                    <td>
                                        <a href="" class="btn btn-success">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="./script.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>