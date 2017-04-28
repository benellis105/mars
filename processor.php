<?php
    error_reporting(0);

    $rover = $_GET['rover'];
    $camera = $_GET['camera'];
    $spiritFhazDays = array(100, 103, 105, 110, 113, 114, 116, 122, 126, 128);
    $spiritRhazDays = array(100, 103, 105, 110, 113, 116, 128, 130, 132, 135);
    $opportunityFhazDays = array(100, 103, 110, 114, 116, 122, 126, 128, 130, 132);
    $opportunityRhazDays = array(100, 103, 110, 114, 116, 128, 130, 132, 133, 134);
    $curiosityFhazDays = array(100, 101, 102, 104, 111, 112, 113, 114, 115, 117);
    $curiosityRhazDays = array(100, 111, 112, 113, 114, 115, 117, 118, 120, 121);
    switch ($rover) {
        case "spirit":
            if ($camera == 'fhaz') {
                $days = $spiritFhazDays;
            } else {
                $days = $spiritRhazDays;
            }
            break;
        case "opportunity":
            if ($camera == 'fhaz') {
                $days = $opportunityFhazDays;
            } else {
                $days = $opportunityRhazDays;
            }
            break;
        case "curiosity":
            if ($camera == 'fhaz') {
                $days = $curiosityFhazDays;
            } else {
                $days = $curiosityRhazDays;
            }
            break;
    }
    $i = rand(0, 9);
    $url = "https://api.nasa.gov/mars-photos/api/v1/rovers/" . $rover . "/photos?sol=" . $days[$i] . "&camera=" . $camera . "&api_key=3k1DLhS3S1j7nAhpWNN2fQCR4v14xGK1MRTcQuKU";
    $cSession = curl_init(); 
    curl_setopt($cSession, CURLOPT_URL,$url);
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($cSession, CURLOPT_HEADER, 0); 
    curl_setopt($cSession, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($cSession);
    curl_close($cSession);
    $result = json_decode($result, 1);
    $imgURL = $result['photos'][0]['img_src']; 
    echo("<a href=\"$imgURL\"><img src=\"" . $imgURL . "\"></img></a>");
?>