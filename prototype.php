<?php
// 原型模式


interface BookInterface
{
    public function setTitle(string $title);

    public function getTitle(): string;
}

class eBookInterface implements BookInterface
{

    protected string $title;

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}


//$book1 = new eBook();
//$book1->setTitle('1 号电子书');
//echo $book1->getTitle(), PHP_EOL;

$prototype = new eBookInterface();

foreach(range(1, 10) as $index){
    $book = clone $prototype;
    $book->setTitle($index. ' 号电子书');
    echo $book->getTitle(), PHP_EOL;
}

