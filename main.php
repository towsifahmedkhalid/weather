<?php
include 'weather.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>

    <!--BOOTSTRAP 5 CDN link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--BOOTSTRAP 5 JS link-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>

<body class="container" style= "background-image: url('https://images.pexels.com/photos/813872/pexels-photo-813872.jpeg?auto=compress&cs=tinysrgb&w=1600');">

    <div class="card p-3 mt-3" style="height:550px">
        <div class="d-flex align-items-start">
            <div class="row container">
                <div class="col-lg-3 col-md-6 col-12">
                    <h3>Weather Forecast</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group input-rounded">
                                    <input type="text" class="form-control" placeholder="Search for city" name="location" required />
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="form-group input-rounded">
                                    <button type="submit" class="btn btn-primary btn-block"> Search </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">

            <!---Current Temperature--->
            <div class="col-sm-6">
                <div class="card" style="height:450px">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $cityname; ?></h4>
                        <h5><?php echo $today; ?></h5>
                        <h6><?php echo ucwords($cloud); ?></h6>
                        <div class="d-flex ">
                            <img class="" style="width: 100px; height: 100px;" src="<?php echo $imgSrc; ?>" />
                            <h1 class="display-3"><?php echo $temp, "&deg;C"; ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <!---Today--->
            <div class="col-sm-6">
                <div class="card" style="height:450px">
                    <div class="card-body">
                        <h5 class="card-title">Today</h5>
                        <div class="card-deck">
                            <div class="card" style="border-radius: 25px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Winds</h5>
                                    <img class="" style="width: 25px; height: 25px;" src="<?php echo $windImg; ?>" />
                                    <h5><?php echo $wind, " km/h"; ?></h5>
                                </div>
                            </div>
                            <div class="card" style="border-radius: 25px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Humidity</h5>
                                    <img class="" style="width: 25px; height:25px;" src="<?php echo $humidityImg; ?>" />
                                    <h5><?php echo $humidity, "%"; ?></h5>
                                </div>
                            </div>
                            <div class="card" style="border-radius: 25px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Visibility</h5>
                                    <img class="" style="width: 25px; height: 25px;" src="<?php echo $visibilityImg; ?>" />
                                    <h5><?php echo $visibility, " km/h"; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---5 days forcast--->
    <div class="card p-3 mt-3 mb-3" style="height:1100px">
        <h5 class="card-title">5 Days Forcast</h5>
        <div class="card-deck">
            <?php $i = 0;
            $j = 0;

            foreach ($forecast as $f) :
                if ($i++ > 4) break;
            ?>
                <div class="card" style="border-radius: 25px;">
                    <div class="card-body text-center">
                        <h6 class="card-title"><?php echo date("l", $forecast[$j]->dt); ?></h6>
                        <p class="card-title">
                            <?php echo date("g:i a", $forecast[$j]->dt);
                            $j = $j + 8; ?>
                        </p>
                        <img class="card-img-top " style="width: 70px; height: 70px;" src="http://openweathermap.org/img/w/<?php echo $f->weather[0]->icon; ?>.png" alt="Weather Icon">
                        <p></p>
                        <strong><?php echo $f->main->temp, "&deg;C"; ?></strong>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>