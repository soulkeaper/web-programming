<html>

<head>
<title>Adapter method test</title>
</head>

<body>
<?php

class Car {

    private $producer;
    private $model;

    function __construct($producer_in, $model_in) {
        $this->producer = $producer_in;
        $this->model  = $model_in;
    }

    function getProducer() {
        return $this->producer;
    }

    function getModel() {
        return $this->model;
    }
}

class CarAdapter {
    private $car;

    function __construct(Car $car_in) {
        $this->car = $car_in;
    }
    function getProducerAndModel() {
        return $this->car->getModel().' by '.$this->car->getProducer();
    }
}

  // client

  writeln('BEGIN TESTING ADAPTER PATTERN');
  writeln('');

  $car = new Car("Audi", "A6");
  $CarAdapter = new CarAdapter($car);
  writeln('Producer and Model: '.$CarAdapter->getProducerAndModel());
  writeln('');

  writeln('END TESTING ADAPTER PATTERN');

  function writeln($line_in) {
    echo $line_in."<br/>";
  }

?>
</body>
</html>