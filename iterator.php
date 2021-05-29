<?php

// 迭代器模式

class Bookshelf implements \Countable, \Iterator
{
    protected array $books = [];
    protected int $current = 0;


    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function current()
    {
        return $this->books[$this->current];
    }

    public function next()
    {
        return $this->current++;
    }

    public function key(): int
    {
        return $this->current;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->current]);
    }

    public function rewind()
    {
        $this->current = 0;
    }

    public function count(): int
    {
        return count($this->books);
    }
}

class Book
{
    protected string $author;
    protected string $title;

    public function __construct(string $author, string $title)
    {
        $this->author = $author;
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthorAndTitle(): string
    {
        return $this->getAuthor() . '-' . $this->getTitle();
    }
}

$bookA = new Book('wu', 'php');
$bookB = new Book('wu', 'redis');

$bookshelf = new Bookshelf();
$bookshelf->addBook($bookA);
$bookshelf->addBook($bookB);

foreach ($bookshelf as $book) {
    echo $book->getAuthorAndTitle(), PHP_EOL;
}