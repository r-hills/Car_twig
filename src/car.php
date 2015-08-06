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

    function save()
    {
        array_push($_SESSION['car_list'], $this);
    }

    static function getAll()
    {
        return $_SESSION['car_list'];
    }

    static function deleteAll()
    {
        $_SESSION['car_list'] = array();
    }

    static function deleteSpecificJob($index)
    {
        unset($_SESSION['car_list'][$index]);
    }

}

?>
