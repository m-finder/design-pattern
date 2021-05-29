<?php

// 访问者模式

interface  Visitor
{
    public function visit($visitor);
}

class Element
{
    protected Visitor $visitor;

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function acceptVisitor(Visitor $visitor)
    {
        $visitor->visit($this);
    }

}

class NameVisitor implements Visitor
{

    public function visit($visitor)
    {
        echo $visitor->getName(), PHP_EOL;
    }
}

$element = new Element('wu');
echo $element->getName(), PHP_EOL;
$element->acceptVisitor(new NameVisitor());