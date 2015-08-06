<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $photo;

    function __construct($model, $cost, $milage=0, $pic)
    {
      $this->make_model = $model;
      $this->price = $cost;
      $this->miles = $milage;
      $this->photo = $pic;
    }
    function setModel ($new_model)
    {
      $string_model = (string) $new_model;
      if (strlen($string_model) > 0)
        $this->make_model = $string_model;
    }
    function getModel ()
    {
      return $this->make_model;
    }
    function setPrice ($new_price)
    {
      $float_price = (float) $new_price;
      if ($float_price !=0){
        $formatted_price = number_format($float_price, 2);
        $this->price = $formatted_price;
      }
    }
    function getPrice ()
    {
      return $this->price;
    }

    function setMilage ($new_milage)
    {
      $float_milage = (float) $new_milage;
      if ($float_milage !=0){
        $formatted_milage = number_format($float_milage, 1);
        $this->miles = $formatted_milage;
      }
    }
    function getMilage ()
    {
      return $this->miles;
    }
    function getPhoto ()
    {
      return $this->photo;
    }

}




// $porsche = new Car ("2014 Porsche 911", 114991.444, 7864,"images/porsche.jpg");
// $ford = new Car ("2011 Ford F450", 55995, 14241, "images/ford.jpg");
// $lexus = new Car ("2013 Lexus RX 350", 44700, 2000,"images/lexus.jpg");
// $mercedes = new Car ("Mercedes Benz CLS550", 39900, 2222, "images/mercedes.jpg");
//$mercedes->setMilage("10.111");
//$porsche -> setPrice("1.111111");
//$lexus->setModel(3);

//$max_price = $_GET["price"];
//$max_milage = $_GET["milage"];


//$cars = array($porsche, $ford, $lexus, $mercedes);

/* $displaycars = array();
$i = 0;
foreach ($cars as $car ) {
    if ( ($car_price = $car->getPrice()) <= $max_price && $car->getMilage() <= $max_milage) {
        $car_model = $car->getModel();
        $car_price = $car->getPrice();
        $car_milage = $car->getMilage();
        $car_photo = $car->getPhoto();
        array_push($displaycars, $car_model, $car_price, $car_milage, $car_photo);
        $display = (string) $displaycars[$i++];
        echo "Cars: $display";
    }
}
*/

?>
