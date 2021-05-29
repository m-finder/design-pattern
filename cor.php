<?php

// 责任链模式

abstract class Handler
{

    protected ?Handler $successor;

    public function __construct(Handler $handler = null)
    {
        $this->successor = $handler;
    }

    abstract public function handle($request);
}

class HttpInNumeric extends Handler
{

    public function __construct(Handler $successor = null)
    {
        parent::__construct($successor);
    }

    public function handle($request)
    {
        if (is_numeric($request)) {
            echo '数字请求', PHP_EOL;
        } else {
            if ($this->successor) {
                return $this->successor->handle($request);
            }
        }

    }
}

class HttpInArray extends Handler
{

    public function handle($request)
    {
        echo '数组请求', PHP_EOL;
    }
}

$handler = new HttpInNumeric(new HttpInArray());
$handler->handle(1);
$handler->handle([1]);