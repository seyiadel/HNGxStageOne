<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


// Global Variables 
$method = $_SERVER['REQUEST_METHOD'];
$requested_slack_name = $_GET['slack_name'];
$requested_track = $_GET['track'];


if($method = "GET"){


    //JSON representation of participant details
    $body = [
            'slack_name' =>  "seyiadel",
            'current_day' => date('l'),
            'utc_time' => date("Y-m-d\TH:i:s\Z"),
            'track' => "backend",
            'github_file_url' => 'https://github.com/seyiadel/HNGxStageOne/blob/main/api/index.php',
            'github_repo_url' => 'https://github.com/seyiadel/HNGxStageOne',
            'status_code' => 200
        ];

    // Parse Array to JSON
    $jsonBody = json_encode($body);

    $slack_name = $body['slack_name'];
    $track = $body['track'];

    // Validate Query Parameters
    if ($requested_slack_name == $slack_name && $requested_track == $track){
        echo $jsonBody;
    }else{
        $err = json_encode(['data' => "Incorrect Credentials"]);
        echo $err;
    }
}