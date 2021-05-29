<?php

// 享元模式

interface Message
{
    public function send(User $user);
}

class AliMessage implements Message
{

    // 内部状态
    protected Template $template;

    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    // user 属于外部状态
    public function send(User $user)
    {
        echo 'use ', $this->template->getTemplate(), ' send msg ', 'to user ', $user->getName(), ' by ali', PHP_EOL;;
    }
}

class MessageFactory
{
    protected array $messages = [];

    public function getMessage(Template $template)
    {
        $key = md5($template->getTemplate());
        if (!array_key_exists($key, $this->messages)) {
            echo 'message create', PHP_EOL;
            $this->messages[$key] = new AliMessage($template);
        }

        return $this->messages[$key];
    }
}

class Template
{
    protected string $template;

    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }
}

class User
{
    protected string $name;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

$templateA = new Template();
$templateA->setTemplate('template a');

$templateB = new Template();
$templateB->setTemplate('template b');

$userA = new User();
$userA->setName('wu');

$userB = new User();
$userB->setName('yf');


$factory = new MessageFactory();
$flyweightA = $factory->getMessage($templateA);
$flyweightA->send($userA);
$flyweightA->send($userB);

$flyweightB = $factory->getMessage($templateB);
$flyweightB->send($userA);