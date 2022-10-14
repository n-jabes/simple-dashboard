<?php
    // connection with the database

    $con = mysqli_connect('localhost', 'root', '', 'display_data_embedded');
    // if($con){
    //     echo "Connection Done";
    // }else{
    //     echo "Connection Failed";
    // }

    $dataPointsGraph = array( 
        array("y" => 3373.64, "label" => "Germany" ),
        array("y" => 2435.94, "label" => "France" ),
        array("y" => 1842.55, "label" => "China" ),
        array("y" => 1828.55, "label" => "Russia" ),
        array("y" => 1039.99, "label" => "Switzerland" ),
        array("y" => 765.215, "label" => "Japan" ),
        array("y" => 612.453, "label" => "Netherlands" )
    );

    $dataPointsPie = array( 
        array("label"=>"Oxygen", "symbol" => "O","y"=>46.6),
        array("label"=>"Silicon", "symbol" => "Si","y"=>27.7),
        array("label"=>"Aluminium", "symbol" => "Al","y"=>13.9),
        array("label"=>"Iron", "symbol" => "Fe","y"=>5),
        array("label"=>"Calcium", "symbol" => "Ca","y"=>3.6),
        array("label"=>"Sodium", "symbol" => "Na","y"=>2.6),
        array("label"=>"Magnesium", "symbol" => "Mg","y"=>2.1),
        array("label"=>"Others", "symbol" => "Others","y"=>1.5),
     
    )

    // $sel = "SELECT * FROM animal_statistics";
    // $query = $con->query($sel);
    // while($row=$query->fetch_assoc()){
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
                text: "Gold Reserves"
            },
            axisY: {
                title: "Gold Reserves (in tonnes)"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($dataPointsGraph, JSON_NUMERIC_CHECK); ?>
            }]
        });

        let pieChart = new CanvasJS.Chart("chartPie", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Average Composition of Magma"
            },
            data: [{
                type: "doughnut",
                indexLabel: "{symbol} - {y}",
                yValueFormatString: "#,##0.0\"%\"",
                showInLegend: true,
                legendText: "{label} : {y}",
                dataPoints: <?php echo json_encode($dataPointsPie, JSON_NUMERIC_CHECK); ?>
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
                    <h2>Temperatures</h2>
                    <div id="chartPie"></div>
                </div>
                <div class="graph page" id="graph">
                    <h2>Weekly Analysis</h2>
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
                                    <th>Distance (m)</th>
                                    <th>Temperature (T)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Device-001</td>
                                    <td>500</td>
                                    <td>49</td>
                                    <td>
                                        <a href="" class="btn btn-success">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Device-002</td>
                                    <td>250</td>
                                    <td>27</td>
                                    <td>
                                        <a href="" class="btn btn-success">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Device-003</td>
                                    <td>700</td>
                                    <td>52</td>
                                    <td>
                                        <a href="" class="btn btn-success">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>Device-004</td>
                                    <td>1500</td>
                                    <td>80</td>
                                    <td>
                                        <a href="" class="btn btn-success">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    // }
                ?>
            </div>
        </div>
    </div>
    <script src="./script.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>