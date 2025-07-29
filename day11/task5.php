<?php
class Vehicle {
    protected $model;
    protected $year;

    public function __construct($model, $year) {
        $this->model = $model;
        $this->year = $year;
    }

    public function displayInfo() {
        echo "Model: " . $this->model . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}

class Car extends Vehicle {
    private $color;

    public function __construct($model, $year, $color) {
        parent::__construct($model, $year);
        $this->color = $color;
    }

    public function displayInfo() {
        parent::displayInfo();
        echo "Color: " . $this->color . "<br>";
    }

    public function startEngine() {
        echo "The " . $this->color . " " . $this->model . "'s engine is running!\n";
    }
}

$vehicle = new Vehicle("Generic Model", 2020);
$vehicle->displayInfo();

$car = new Car("Toyota Camry", 2022, "Red");
$car->displayInfo();
$car->startEngine();
?>