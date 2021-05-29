<?php

// 门面模式

class Facade
{

    private Subsystem $subsystemA;
    private Subsystem $subsystemB;

    public function __construct(Subsystem $subsystemA, Subsystem $subsystemB)
    {
        $this->subsystemA = $subsystemA;
        $this->subsystemB = $subsystemB;
    }

    public function subsystemARun()
    {
        $this->subsystemA->run();
    }

    public function subsystemBRun()
    {
        $this->subsystemB->run();
    }
}


interface Subsystem
{
    public function run();
}

class SubsystemA implements Subsystem
{
    public function run()
    {
        echo '子系统 A 运行', PHP_EOL;
    }
}


class SubsystemB implements Subsystem
{
    public function run()
    {
        echo '子系统 B 运行', PHP_EOL;
    }
}

$subsystemA = new SubsystemA();
$subsystemB = new SubsystemB();
$facade = new Facade($subsystemA, $subsystemB);
$facade->subsystemARun();
$facade->subsystemBRun();