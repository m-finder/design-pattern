<?php

// 策略模式


interface Strategy
{
    public function algorithm();
}

class AlgorithmA implements Strategy
{

    public function algorithm()
    {
        echo '算法 A', PHP_EOL;
    }
}

class AlgorithmB implements Strategy
{

    public function algorithm()
    {
        echo '算法 B', PHP_EOL;
    }
}

class Context
{
    protected Strategy $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function callAlgorithm()
    {
        $this->strategy->algorithm();
    }
}

$algorithmA = new AlgorithmA();
$contextA = new Context($algorithmA);
$contextA->callAlgorithm();

$algorithmB = new AlgorithmB();
$contextB = new Context($algorithmB);
$contextB->callAlgorithm();
