<?php
class Book {
    public $title;

    public function read() {
        echo "is being read $this->title";
    }
}

$book = new Book();
$book->title = "mohammed";
$book->read();
