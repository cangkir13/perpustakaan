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

    public function Create(array $request)
    {
        return Book::Create($request);
    }

    public function Update(int $id, array $request)
    {
        return Book::where('id', $id)->update($request);
    }

    public function Delete(int $id)
    {
        return Book::where('id', $id)->delete();
    }
}
