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

        return $app['twig']->render('index.html.twig', array('car_list' => Car::getAll()));
    });

        //Search for cars passing in parameters
    $app->get("/display_results", function() use ($app) {

        $porsche = new Car ("2014 Porsche 911", 114991.444, 7864,"porsche.jpg");
        // $ford = new Car ("2011 Ford F450", 55995, 14241, "ford.jpg");
        // $lexus = new Car ("2013 Lexus RX 350", 44700, 2000,"lexus.jpg");
        // $mercedes = new Car ("Mercedes Benz CLS550", 39900, 2222, "mercedes.jpg");
        //
        $cars = Car::getAll();

        $max_price = $_GET['price'];
        $max_milage = $_GET['milage'];

        $result_list = array();

        if(!empty($cars)) {
            foreach ($cars as $car) {
                $car_price = $car->getPrice();
                $car_milage = $car->getMilage();
                if ( $car_price <= $max_price && $car_milage <= $max_milage) {
                        array_push($result_list, $car);
                }
            }
        }

        return $app['twig']->render('display_results.html.twig', array('car_list' => $result_list));

    });

    $app->get("/create_post", function() use ($app) {
        return $app['twig']->render('create_post.html.twig');

    });

    $app->post("/car_posted", function() use ($app) {

        $car = new Car($_POST['model'],$_POST['price'],$_POST['milage'],$_POST['photo']);
        $car->save();

        return $app['twig']->render('car_posted.html.twig', array('newcar' => $car));
    });

    return $app;

?>
