<?php

namespace App\Repositories\Book;

interface BookInterface {
    public function GetAll();
    public function Create(array $request);
}
