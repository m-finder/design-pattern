<?php

// 备忘录模式

class Memento
{

    protected string $state;

    public function __construct(string $state)
    {
        $this->state = $state;
    }


    public function getState(): string
    {
        return $this->state;
    }
}

class Originator
{

    protected Memento $memento;

    protected string $state;

    public function setMemento(Memento $memento): Memento
    {
        $this->memento = $memento;
       return $this->memento;
    }

    public function getMemento(): Memento
    {
        return $this->memento;
    }

    public function getState(): string
    {
        $this->state = $this->memento->getState();
        return $this->state;
    }
}

$state = 'new state';
$originator = new Originator();
$memento = new Memento('memento state');
echo $memento->getState(), PHP_EOL;

$originator->setMemento($memento);
echo $originator->getState(), PHP_EOL;
