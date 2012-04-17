<html>
<head>
    <title>Factory pattern example</title>
</head>

<body>
<?php

abstract class AbstractFactoryMethod {
    abstract function makeSpecialCar($param);
}

class FactoryMethod1 extends AbstractFactoryMethod
{    
    private $context = "Factory1";
    
    function makeSpecialCar($param) {
	$car = NULL;
	
        switch ($param)
	{
            case "us":
                $car = new factory1SpecialCar;
            break;
            case "other":
                $car = new factory2SpecialCar;
            break;
            default:
                $car = new factory1SpecialCar;
            break;		  
        }  	  
	return $car;
    }
}

class FactoryMethod2 extends AbstractFactoryMethod {
    
    private $context = "Factory2";
    
    function makeSpecialCar($param)
    {
        $car = NULL;
	
        switch ($param) {
            case "us":
                $car = new factory2SpecialCar;
            break;		
            case "other":
                $car = new factory1SpecialCar;
            break;
            case "special":
                $car = new DeepSeaSpecialCar;
            break;
            default:
                $car = new factory2SpecialCar;
            break;	  
        }	  
        return $car;
    }
}

abstract class AbstractCar {
    abstract function getProducer();
    abstract function getModel();
}

abstract class AbstractSpecialCar {
    private $subject = "Car driving under water";
}

class factory1SpecialCar extends AbstractSpecialCar {
    
    private $producer;
    private $model;
    private static $oddOrEven = 'odd';
    
    function __construct() {
        //alternate between 2 cars
        if ('odd' == self::$oddOrEven) {
            $this->producer = 'BMW';
            $this->model  = 'X6aqua';
            self::$oddOrEven = 'even';
        } else {
            $this->producer = 'Opel';
            $this->model  = 'Astrasubmarine'; 
            self::$oddOrEven = 'odd';
        }  
    }
    function getProducer() {return $this->producer;}
    function getModel() {return $this->model;}
}

class factory2SpecialCAr extends AbstractSpecialCar {
    
    private $producer;
    private $model;
    
    function __construct() {
        //alternate randomly between 2 cars
        mt_srand((double)microtime()*10000000);
        $rand_num = mt_rand(0,1);      
 
        if (1 > $rand_num) {
            $this->producer = 'Toyota';
            $this->model  = 'Toyotadeep';
        } else {
            $this->producer = 'Ferrary';
            $this->model = 'Darkblue'; 
        }  
    }
    function getProducer() {return $this->producer;}
    function getModel() {return $this->model;}
}

class DeepSeaSpecialCar extends AbstractSpecialCar {
    private $producer;
    private $model;
    function __construct() {
      $this->producer = 'Russian Navy';
      $this->model = 'Submarinecar';
    }
    function getProducer() {return $this->producer;}
    function getModel() {return $this->model;}
}
////////////////////////////////////////////////////////
  writeln('START TESTING FACTORY METHOD PATTERN');
  writeln('');

  writeln('testing FactoryMethod1');
  $factoryMethodInstance = new FactoryMethod1;
  testFactoryMethod($factoryMethodInstance);
  writeln('');

  writeln('testing FactoryMethod2');
  $factoryMethodInstance = new FactoryMethod2;
  testFactoryMethod($factoryMethodInstance);
  writeln('');

  writeln('END TESTING FACTORY METHOD PATTERN');
  writeln('');
  
///////////////////////////////////////////////////////
  function testFactoryMethod($factoryMethodInstance) {
    $madeCar = $factoryMethodInstance->makeSpecialCar("us");
    writeln('us car Producer: '.$madeCar->getProducer());
    writeln('us car Model: '.$madeCar->getModel());

    $madeCar = $factoryMethodInstance->makeSpecialCar("other");
    writeln('other car Producer: '.$madeCar->getProducer());
    writeln('other car Model: '.$madeCar->getModel());
 
    $madeCar = $factoryMethodInstance->makeSpecialCar("special");
    writeln('special car Producer:'.$madeCar->getProducer());
    writeln('special car Model: '.$madeCar->getModel());
  }

  function writeln($line_in) {
    echo $line_in."<br/>";
  }
?>
</body>
</html>