<html>
<head>
    <title>Singleton example</title>
</head>
<body>
<?php

//   Singleton class
 
class CarSingleton {
    private $produser = 'Audi';
    private $model  = 'A8';
    private static $car = NULL;
    private static $isAlreadyRented = FALSE;

    private function __construct() {
    }

    static function rentCar() {
      if (FALSE == self::$isAlreadyRented) {
        if (NULL == self::$car) {
           self::$car = new CarSingleton();
        }
        self::$isAlreadyRented = TRUE;
        return self::$car;
      } else {
        return NULL;
      }
    }

    function returnCar(CarSingleton $carReturned) {
        self::$isAlreadyRented = FALSE;
    }

    function getProduser() {return $this->produser;}

    function getModel() {return $this->model;}

    function getFullinfo() {
      return $this->getModel() . ' by ' . $this->getProduser();
    }
  }
 
class CarRenter {
    private $rentedCar;
    private $haveCar = FALSE;

    function __construct() {
    }

    function getProduserAndModel() {
      if (TRUE == $this->haveCar) {
        return $this->rentedCar->getFullinfo();
      } else {
        return "I don't have the car";
      }
    }

    function rentCar() {
      $this->rentedCar = CarSingleton::rentCar();
      if ($this->rentedCar == NULL) {
        $this->haveCar = FALSE;
        echo '<br>Sorry the car is already rented.</br>';
      }
      else {
        $this->haveCar = TRUE;
      }
    }

    function returnCar() {
      $this->rentedCar->returnCar($this->rentedCar);
    }
  }
 
 //Функция за удобно изписване на редовете:
 
function writeln($text) {
    echo $text.'<br/>';
  }
  
 //Testing

  writeln('BEGIN TESTING SINGLETON PATTERN');
  writeln('');

  $carRenter1 = new CarRenter();
  $carRenter2 = new CarRenter();

  
  writeln('carRenter1 asked to rent the car');
  $carRenter1->rentCar();
  writeln('Rented car produser and model: ');
  writeln($carRenter1->getProduserAndModel());
  writeln('');

  
  writeln('carRenter2 asked to rent the car');
  $carRenter2->rentCar();
  writeln('Rented car produser and model: ');
  writeln($carRenter2->getProduserAndModel());
  writeln('');

  $carRenter1->returnCar();
  writeln('carRenter1 returned the car');
  writeln('');

  $carRenter2->rentCar();
  writeln('carRenter2 Produser and model: ');
  writeln($carRenter2->getProduserAndModel());
  writeln('');

  writeln('END TESTING SINGLETON PATTERN');

  
?>
</body>
</html>