<?php

namespace App\Repositories\Book;

interface BookInterface {
    public function GetAll();
    public function Create(array $request);
    public function Update(int $id, array $request);
    public function Delete(int $id);
}
