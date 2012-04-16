<?php

class ProxyCarList {

    private $carList = NULL;   //car lista ne se inicializira pri suzdavaneto na obekt ot tozi klas.

    function __construct() {
    }

    function getCarCount() {
        if (NULL == $this->carList) {
            $this->makeCarList(); 
        }
        return $this->carList->getCarCount();
    }

    function addCar($car) {
        if (NULL == $this->carList) {
            $this->makeCarList(); 
        }
        return $this->carList->addcar($car);
    }  

    function getCar($carNum) {
        if (NULL == $this->carList) {
            $this->makeCarList();
        } 
        return $this->carList->getCar($carNum);
    }

    function removeCar($car) {
        if (NULL == $this->carList) {
            $this->makeCarList();
        } 
        return $this->carList->removeCar($car);
    }

    //Create 
    function makeCarList() {
        $this->carList = new carList();
    }
}

class carList {

    private $cars = array();
    private $carCount = 0;

    public function __construct() {
    }

    public function getCarCount() {
        return $this->carCount;
    }

    private function setCarCount($newCount) {
        $this->carCount = $newCount;
    }

    public function getCar($carNumberToGet) {
        if ( (is_numeric($carNumberToGet)) && ($carNumberToGet <= $this->getcarCount())) {
            return $this->cars[$carNumberToGet];
        } else {
           return NULL;
        }
    }

    public function addCar(Car $car_in) {
        $this->setCarCount($this->getCarCount() + 1);
        $this->cars[$this->getCarCount()] = $car_in;
        return $this->getCarCount();
    }

    public function removeCar(Car $car_in) {
        $counter = 0;
        while (++$counter <= $this->getCarCount()) 
	 {
          if ($car_in->getProducerAndModel() == $this->cars[$counter]->getProducerAndModel()) {
            for ($x = $counter; $x < $this->getCarCount(); $x++) 
	    {
              $this->cars[$x] = $this->cars[$x + 1];
            }
           $this->setCarCount($this->getCarCount() - 1);
          }
         }
      return $this->getCarCount();
    }
}

class Car {

    private $produser;
    private $model;

    function __construct($producer_in, $model_in) {
      $this->producer = $producer_in;
      $this->model = $model_in;
    }

    function getProducer() {
        return $this->producer;
    }

    function getModel() {
        return $this->model;
    }

    function getProducerAndModel() {
      return $this->getModel().' by '.$this->getProducer();
    }
}

//Test

  writeln('BEGIN TESTING PROXY PATTERN');
  writeln('');
 
  $proxyCarList = new ProxyCarList();
  $inCar = new Car('X5','BMV');
  $proxyCarList->addCar($inCar);
 
  writeln('test 1 - show the car count after a car is added');
  writeln($proxyCarList->getCarCount());
  writeln('');
 
  writeln('test 2 - show the car');
  $outCar = $proxyCarList->getCar(1);
  writeln($outCar->getProducerAndModel()); 
  writeln('');
 
  $proxyCarList->removeCar($outCar);
 
  writeln('test 3 - show the car count after a car is removed');
  writeln($proxyCarList->getCarCount());
  writeln('');

  writeln('END TESTING PROXY PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }

?>