<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            require_once 'REST.php';
            $cities = array("37.8267,-122.4233", "45.81310,15.97230", "48.20849,16.37208");
            foreach ($cities as $city) {
                $url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $city . '?exclude=minutely,hourly,daily,alerts,flags';

                $result = curl_get($url);
                $weather = json_decode($result); //it turns the json into an object
                $fahrenheit = $weather->currently->temperature; //fetch the value from the temperature option

                $celsius = round(($fahrenheit - 32) * (5 / 9), 2); //convert fahrenheit into celsius

                echo "
                    <div class='card text-center text-white bg-primary' style='width: 18rem; font-size: 1.2rem'>
                        <p class='card-title'> {$weather->timezone} </p>
                        <div class='card-body'>
                            <p class='card-text'> {$weather->currently->summary} </p>
                            <p class='card-text'>{$celsius}°C</p>
                            <p class='card-text'>{$fahrenheit}°F</p>
                        </div>
                    </div>";
            }
            
            ?>
        </div>
    </div>
</body>

</html>