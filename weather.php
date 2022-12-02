<?php

$cityname = "";
$today = "";
$imgSrc = "";
$temp = "";
$wind = "";
$humidity = "";
$visibility = "";
$cloud = "";
$forecast = [];

$windImg = "https://cdn-icons-png.flaticon.com/512/615/615579.png";
$visibilityImg = "https://cdn-icons-png.flaticon.com/512/633/633633.png";
$humidityImg = "https://cdn-icons-png.flaticon.com/512/727/727790.png";


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $url = "https://api.openweathermap.org/data/2.5/weather?q=" . $location . "&units=metric&appid=8a4a4562e285d51f8df30386e407fcef";

    $contents = file_get_contents($url);
    $data = json_decode($contents);
    $cityname = $data->name;
    $today = date("F j, Y");
    $im = $data->weather[0]->icon;
    $imgSrc = "http://openweathermap.org/img/wn/10d@2x.png";

    $temp = $data->main->temp;
    $wind = $data->wind->speed;
    $humidity = $data->main->humidity;
    $visibility = ($data->visibility) / 1000;
    $cloud = $data->weather[0]->description;

    // 5 Days forcast
    $forecastUrl = "https://api.openweathermap.org/data/2.5/forecast?q=" . $location . "&units=metric&appid=8a4a4562e285d51f8df30386e407fcef";
    $contents2 = file_get_contents($forecastUrl);
    $fData = json_decode($contents2);
    $forecast = $fData->list;

}

?>