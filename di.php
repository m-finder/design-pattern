<?php

// 依赖注入模式

class Computer
{

    protected HardDisk $hardDisk;

    public function __construct(HardDisk $disk)
    {
        $this->hardDisk = $disk;
    }

    public function run()
    {
        $this->hardDisk->run();
        echo '一台没有感情的电脑开始运行', PHP_EOL;
    }
}

class  HardDisk
{
    public function run()
    {
        echo '一块没有感情的硬盘开始运行', PHP_EOL;
    }
}

$disk = new HardDisk();
$computer = new Computer($disk);
$computer->run();


class Container
{

    public array $bindings = [];

    public function bind($key, Closure $value)
    {
        $this->bindings[$key] = $value;
    }

    public function make($key)
    {
        $new = $this->bindings[$key];
        return $new();
    }

}

$container = new Container();

$container->bind('disk', function (){
    return new HardDisk();
});
$container->bind('computer', function () use($container){
    return new Computer($container->make('disk'));
});

$computer = $container->make('computer');
$computer->run();