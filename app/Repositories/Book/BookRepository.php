<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\Book\BookInterface;

class BookRepository implements BookInterface
{

    public function GetAll()
    {
        return Book::with('category')->get();
    }

    public function Create(array $reqeust)
    {
        return Book::Create($reqeust);
    }
}
