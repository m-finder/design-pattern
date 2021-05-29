<?php

// 桥接模式

abstract class Shape
{
    protected Color $color;

    public function setColor(Color $color)
    {
        $this->color = $color;
    }

    public abstract function draw();
}

class Circle extends Shape
{

    public function draw()
    {
        $this->color->setColor();
        $this->size->setSize();
        echo 'circle', PHP_EOL;
    }
}

interface Color{
    public function setColor();
}

class Blue implements Color{

    public function setColor()
    {
       echo 'blue', PHP_EOL;
    }
}

class Red implements Color{
    public function setColor()
    {
        echo 'red', PHP_EOL;
    }
}

$shape = new Circle();
$shape->setColor(new Blue());
$shape->draw();

$shape->setColor(new Red());
$shape->draw();

