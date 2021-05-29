<?php
// 装饰器模式

interface SendSms
{
    public function Send();
}


interface Decorator
{

    public function beforeSend();

    public function afterSend();

}


class SmsDecorator implements Decorator{

    public function beforeSend()
    {
        echo 'check', PHP_EOL;
    }

    public function afterSend()
    {
        echo 'log', PHP_EOL;
    }
}

class AuthSms implements SendSms
{

    protected $decorators = [];

    public function addDecorator(Decorator $decorator)
    {
        array_push($this->decorators, $decorator);
    }

    protected function beforeSend()
    {
        /**
         * @var Decorator $decorator
         */
        foreach ($this->decorators as $decorator) {
            $decorator->beforeSend();
        }
    }

    protected function afterSend()
    {

        $decorators = array_reverse($this->decorators);
        /**
         * @var Decorator $decorator
         */
        foreach ($decorators as $decorator) {
            $decorator->afterSend();
        }
    }

    public function Send()
    {
        $this->beforeSend();
        echo 'auth sms is send', PHP_EOL;
        $this->afterSend();
    }

}


$sms = new AuthSms();
$sms->addDecorator(new SmsDecorator());
$sms->send();

