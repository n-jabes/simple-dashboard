<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

     $con = mysqli_connect('localhost', 'root', '', 'display_data_embedded');


     function create (){
        $data = json_decode(file_get_contents("php://input"));
        $stmt = $con->prepare("INSERT INTO iot ('name','temperature') VALUES (?,?)");
        
        $name = $data->name;
        $temperature = $data->temperature;

        $stmt->bind_param("si", $name, $temperature);
        if($stmt->execute()){
            http_response_code(201);
            echo json_encode(array("message"=>"Data recorded successfully"));
        }
    }
?>