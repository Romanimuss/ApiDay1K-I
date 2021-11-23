<?php

function build_query_string(array $params) {
    $query_string = http_build_query($params);
    //generates URL-encoded for a query string
    return $query_string;
}
function curl_get($url) {
    $client = curl_init($url);
    //Initializes a new CURL and prepares for next step
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    //Set an option for a CURL transfer
    $response = curl_exec($client);
    //it executes the CURL and return a string
    curl_close($client);
    //Closes a CURL session and frees all resources.
    return $response;
}
$data = array(
    'name' => 'Jack Sparrow',
    'age'  => 32,
    'gender'  => 'male',
    'dob'  => '1990-05-16'
);
$url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/48.20849,16.37208?exclude=minutely,hourly,daily,alerts,flags';
// // echo build_query_string($data);
// $url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/48.20849,16.37208?exclude=minutely,hourly,daily,alerts,flags';
$weather = curl_get($url);
echo $weather;
// $neww = json_decode($weather);
// // var_dump($neww);
// echo "<br>";
// echo $neww->currently->visibility;