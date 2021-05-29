<?php
// 代理模式


interface RequestInterface
{
    public function getRequest();

}

class Request implements RequestInterface{

    public function getRequest()
    {
        echo 'get request', PHP_EOL;
    }
}

class Proxy implements RequestInterface
{

    protected Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }


    public function getRequest()
    {
        echo 'add log in proxy', PHP_EOL;
        $this->request->getRequest();
    }
}


$proxy = new Proxy();
$proxy->getRequest();