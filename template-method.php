<?php

// 模板方法

abstract class BaseController
{
    public function baseMethod()
    {
        echo 'base method', PHP_EOL;
    }

    public abstract function operate();
}

class UserController extends BaseController {

    public function operate()
    {
        echo 'user operate', PHP_EOL;
    }
}

$user = new UserController();
$user->baseMethod();
$user->operate();