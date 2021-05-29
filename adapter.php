<?php
// 适配器模式


interface Toy
{
    public function openMouse();

    public function closeMouse();
}

interface RemoteControlToy
{

    public function doOpenMouse();

    public function doCloseMouse();
}

class Dog implements Toy
{

    public function openMouse()
    {
        echo 'dog open mouse', PHP_EOL;
    }

    public function closeMouse()
    {
        echo 'dog close mouse', PHP_EOL;
    }
}

class RemoteControlDog implements RemoteControlToy{

    public function doOpenMouse()
    {
        echo 'remote control dog open mouse', PHP_EOL;
    }

    public function doCloseMouse()
    {
        echo 'remote control dog close mouse', PHP_EOL;
    }
}

class RemoteControllerToyAdapter implements Toy
{
    protected RemoteControlToy $adapter;

    public function __construct(RemoteControlToy $target)
    {
        $this->adapter = $target;
    }

    public function openMouse()
    {
       $this->adapter->doOpenMouse();
    }

    public function closeMouse()
    {
        $this->adapter->doCloseMouse();
    }
}

$dog = new Dog();
$dog->openMouse();

$adapterDog = new RemoteControllerToyAdapter(new RemoteControlDog());
$adapterDog->openMouse();
