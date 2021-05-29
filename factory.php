<?php
// 工厂模式


interface Car
{
    public function makeCar();

}

class BMWCar implements Car
{

    public function makeCar()
    {
        echo '来一辆别摸我', PHP_EOL;
    }
}


class VolvoCar implements Car
{
    public function makeCar()
    {
        echo '来一辆沃尔沃', PHP_EOL;
    }
}

interface Factory
{
    public static function getInstance(): Car;
}


// 简单工厂
class simpleFactory
{
    public static function makeBMW(): BMWCar
    {
        return new BMWCar();
    }
}

$bmw = simpleFactory::makeBMW();
$bmw->makeCar();


// 工厂方法
class BMwFactory implements Factory
{

    /**
     * @return BMWCar
     */
    public static function getInstance(): Car
    {
        return new BMWCar();
    }
}

class VolvoFactory implements Factory
{
    public static function getInstance(): Car
    {
        return new VolvoCar();
    }
}

$bmw = BMwFactory::getInstance();
$bmw->makeCar();

$volvo = VolvoFactory::getInstance();
$volvo->makeCar();


