<?php
    // dependencies
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    session_start();
    if (empty($_SESSION['car_list'])) {
        $_SESSION['car_list'] = array();
    }

    //create and check cookie
    $app = new Silex\Application();
    $app['app'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // ROUTES

        //root page
    $app->get("/", function() use ($app) {

        return $app['twig']->render('find_cars.html.twig', array('car_list' => Car::getAll()));
    });

        //Search for cars passing in parameters
    $app->get("/display_results", function() use ($app) {

        $porsche = new Car ("2014 Porsche 911", 114991.444, 7864,"porsche.jpg");
        $ford = new Car ("2011 Ford F450", 55995, 14241, "ford.jpg");
        $lexus = new Car ("2013 Lexus RX 350", 44700, 2000,"lexus.jpg");
        $mercedes = new Car ("Mercedes Benz CLS550", 39900, 2222, "mercedes.jpg");

        $cars = array($porsche, $ford, $lexus, $mercedes);

        $max_price = $_GET['price'];
        $max_milage = $_GET['milage'];

        $result_list = array();

        foreach ($cars as $car) {
            if ( $car->getPrice() <= $max_price && $car->getMilage() <= $max_milage) {

                    array_push($result_list, $car);



                // $output = $output . "<li>" . $car->getModel() . "</li>
                //  <li> <img src=" . $car->getPhoto() ."> </li>
                //  <ul>
                //      <li> $".$car->getPrice() . "</li>
                //      <li> Miles:" . $car->getMilage() . "</li>
                //  </ul>
                //  <p>  </p>";


            }
        }

        return $app['twig']->render('display_results.html.twig', array('car_list' => $result_list));

    });

    return $app;

?>
