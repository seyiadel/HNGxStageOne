<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


// Global Variables 
$method = $_SERVER['REQUEST_METHOD'];
$requested_slack_name = $_GET['slack_name'];
$requested_track = $_GET['track'];


if($method = "GET"){

    // Set Timezone to UTC +1:00
    date_default_timezone_set("Africa/Lagos");

    //JSON representation of participant details
    $body = [
        'data' => [
            'slack_name' =>  "seyiadel",
            'current_day' => date('l'),
            'utc_time' => date("Y-m-d H:i:s"),
            'track' => "backend",
            'github_file_url' => 'https://github.com/seyiadel/HNGxStageOne/blob/main/api.php',
            'github_repo_url' => 'https://github.com/seyiadel/HNGxStageOne',
            'status_code' => 200

        ]
        ];

    // Parse Array to JSON
    $jsonBody = json_encode($body);

    $slack_name = $body['data']['slack_name'];
    $track = $body['data']['track'];

    // Validate Query Parameters
    if ($requested_slack_name == $slack_name && $requested_track == $track){
        echo $jsonBody;
    }else{
        $err = json_encode(['data' => "Incorrect Credentials"]);
        echo $err;
    }
}