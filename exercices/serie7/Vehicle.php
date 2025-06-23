<?php
class Vehicle {
    const TYPE_MOTORCYCLE = 'Motorcycle';
    const TYPE_CAR = 'Car';
    const TYPE_TRUCK = 'Truck';
    const TYPE_UNKNOWN = 'Unknown';

    private $numberOfWheels;
    private $color;
    private $brand;
    private $model;

    public function __construct($numberOfWheels, $color, $brand, $model)
    {
        $this->numberOfWheels = $numberOfWheels;
        $this->color = $color;
        $this->brand = $brand;
        $this->model = $model;
    }

    public function getNumberOfWheels() {
        return $this->numberOfWheels;
    }

    public function setNumberOfWheels($numberOfWheels) {
        $this->numberOfWheels = $numberOfWheels;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getDescription() {
        return "$this->brand $this->model, $this->color, $this->numberOfWheels wheels";
    }

    public function type() {
        if ($this->numberOfWheels==2) {
            return self::TYPE_MOTORCYCLE;
        } elseif ($this->numberOfWheels==4) {
            return self::TYPE_CAR;
        } elseif ($this->numberOfWheels>4) {
            return self::TYPE_TRUCK;
        } else {
            return self::TYPE_UNKNOWN;
        }
    }
}

$car = new Vehicle(4, 'Red', 'Toyota', 'Corolla');
$moto = new Vehicle(2, 'Black', 'Yamaha', 'MT-07');
$truck = new Vehicle(6, 'Blue', 'Volvo', 'FH16');
$unknown = new Vehicle(0, 'Green', 'UFO', 'X-2000');

echo $car->getDescription() . ", Type : " . $car->type() . "<br>";
echo $moto->getDescription() . ", Type : " . $moto->type() . "<br>";
echo $truck->getDescription() . ", Type : " . $truck->type() . "<br>";
echo $unknown->getDescription() . ", Type : " . $unknown->type() . "<br>";
