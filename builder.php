<?php

class Human
{

    public function setHead(string $head)
    {
        echo 'head:', $head, PHP_EOL;
    }

    public function setBody(string $body)
    {
        echo 'body:', $body, PHP_EOL;
    }

    public function setArms(string $leftArm, string $rightArm)
    {
        echo 'left arm:', $leftArm, ' right arm:', $rightArm, PHP_EOL;
    }
}

interface Builder
{
    public function buildHead();

    public function buildBody();

    public function buildArms();

    public function getResult(): Human;
}


class HumanBuilder implements Builder{
    private Human $human;

    public function __construct()
    {
        $this->human = new Human();
    }

    public function buildHead()
    {
        $this->human->setHead('ai');
    }

    public function buildBody()
    {
        $this->human->setBody('body');
    }

    public function buildArms()
    {
        $this->human->setArms('left', 'right');
    }

    public function getResult(): Human
    {
        return $this->human;
    }
}

class Director{


    public function builder(Builder $builder): Human
    {
        $builder->buildHead();
        $builder->buildBody();
        $builder->buildArms();
        return $builder->getResult();
    }
}

$director = new Director();
$human = $director->builder(new HumanBuilder());

