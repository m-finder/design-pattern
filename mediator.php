<?php

// 中介者模式

interface MediatorInterface
{
    public function send($service, string $message);
}

class Mediator implements MediatorInterface
{

    public function send($service, string $message)
    {
        $service->notify($message);
    }
}

abstract class Colleague
{
    private MediatorInterface $mediator;

    protected Colleague $colleague;

    public function setColleague(Colleague $colleague)
    {
        $this->colleague = $colleague;
    }

    public function getColleague(): Colleague
    {
        return $this->colleague;
    }

    public function setMediator(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }

    public function getMediator(): MediatorInterface
    {
        return $this->mediator;
    }

    public abstract function notify(string $message);
}


class ClientA extends Colleague
{

    public function send($message)
    {
        return $this->getMediator()->send($this, $message);
    }

    public function notify(string $message)
    {
        echo get_class($this->getColleague()), ' 收到消息：',  $message, PHP_EOL;
    }
}

class ClientB extends Colleague
{

    public function send($message)
    {
        return $this->getMediator()->send($this, $message);
    }

    public function notify(string $message)
    {
        echo get_class($this->getColleague()), ' 收到消息：', $message, PHP_EOL;
    }

}

$mediator = new Mediator();
$clientA = new ClientA();
$clientB = new ClientB();


$clientA->setMediator($mediator);
$clientB->setMediator($mediator);

$clientA->setColleague($clientB);
$clientB->setColleague($clientA);

$clientA->send('吃饭了没？');
$clientB->send('没呢，要请客？');