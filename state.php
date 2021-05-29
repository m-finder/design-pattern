<?php

// 状态模式

abstract class State
{
    protected string $state;

    public function getState(): string
    {
        return $this->state;
    }

    abstract public function handle();
}

class StateContext
{
    protected State $state;


    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function getState(): string
    {
        return $this->state->getState();
    }

    public function handle()
    {
        $this->state->handle();
    }
}

class CreateOrder extends State
{
    public function __construct()
    {
        $this->state = 'create';
    }

    public function handle()
    {
        echo '创建订单', PHP_EOL;
    }
}

class FinishOrder extends State
{

    public function __construct()
    {
        $this->state = 'finish';
    }


    public function handle()
    {
        echo '结束订单', PHP_EOL;
    }
}

$stateContext = new StateContext();
$stateContext->setState(new CreateOrder());
$stateContext->handle();
echo $stateContext->getState(), PHP_EOL;

$stateContext->setState(new FinishOrder());
$stateContext->handle();
echo $stateContext->getState(), PHP_EOL;