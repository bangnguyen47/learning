<?php

/**
 * This is target file
 * Please turn true, false and null of following code into uppercase.
 */
class Color {

    private $color_name;

    function __construct($color_name) {
        $this->color_name = strtolower($color_name);
    }

    public function getColorCode() {
        if ($this->color_name == 'red') {
            return 0xff0000;
        } else if ($this->color_name == 'green') {
            return 0x00ff00;
        } else if ($this->color_name == 'blue') {
            return 0x0000ff;
        } else {
            throw new Exception('Unknown color');
        }
    }

    public function getName() {
        return $this->color_name;
    }

}

class Brand {

    private $name;

    function __construct($name) {

        $this->name = $name;

    }

    public function getName() {
        return $this->name;
    }

}

class Vehicle
{

    private $color;
    private $brand;

    public function __construct(Color $color, Brand $brand) {
        $this->color = $color;
        $this->brand = $brand;
    }

    public function changeColor(Color $color) {
        $this->color = $color;
    }

    public function changeBrand(Brand $brand) {
        $this->brand = $brand;
    }

    public function getBrand() {
        return $this->brand;
    }
}

class Car extends Vehicle
{

    /**
     * @var Brand
     */
    private $brand;

    /**
     * @var Color
     */
    private $color;

    public function __construct(Color $color, Brand $brand) {
        $this->color = $color;
        $this->brand = $brand;
    }

    public function changeColor(Color $color) {
        if ($color === null) {
            die('color cannot be NULL');
        }
        parent::changeColor($color);
    }

    public function isRed() {
        if ($this->color->getName() == 'red') {
            return true;
        } else {
            return false;
        }
    }

}

$audiA4 = new Car(new Color('red'), new Brand('Audi'));

if ($audiA4->isRed()) {
    echo 'Your '.$audiA4->getBrand()->getName().' is red.';
} else {
    echo 'Your '.$audiA4->getBrand()->getName().' is not red.';
}