<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    $app = new Silex\Application();

    $app->get("/car_form", function() {
      return "<!DOCTYPE html>
              <html>
              <head>
                  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
                  <title>Find a Car</title>
              </head>
              <body>
                  <div class='container'>
                      <h1>Find a Car!</h1>
                      <form action='/car'>
                          <div class='form-group'>
                              <label for='price'>Enter Maximum Price:</label>
                              <input id='price' name='price' class='form-control' type='number'>
                              <label for='milage'>Enter Maximum Mileage:</label>
                              <input id='milage' name='milage' class='form-control' type='number'>
                          </div>
                          <button type='submit' class='btn-success'>Submit</button>
                      </form>
                  </div>
              </body>
              </html>";
    });

    $app->get("/car", function() {

        $porsche = new Car ("2014 Porsche 911", 114991.444, 7864,"images/porsche.jpg");
        $ford = new Car ("2011 Ford F450", 55995, 14241, "images/ford.jpg");
        $lexus = new Car ("2013 Lexus RX 350", 44700, 2000,"images/lexus.jpg");
        $mercedes = new Car ("Mercedes Benz CLS550", 39900, 2222, "images/mercedes.jpg");

        $cars = array($porsche, $ford, $lexus, $mercedes);

        $max_price = $_GET['price'];
        $max_milage = $_GET['milage'];

        $output = "";
        foreach ($cars as $car) {
            if ( $car->getPrice() <= $max_price && $car->getMilage() <= $max_milage) {
                $output = $output . "<li>" . $car->getModel() . "</li>
                 <li> <img src=" . $car->getPhoto() ."> </li>
                 <ul>
                     <li> $".$car->getPrice() . "</li>
                     <li> Miles:" . $car->getMilage() . "</li>
                 </ul>
                 <p>  </p>";
            }
        }

        if ( strlen($output) == 0 ) {
            $output = "No matches found";
        }

        return $output;

    });

    return $app;

?>
