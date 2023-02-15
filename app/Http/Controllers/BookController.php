<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Repositories\Book\BookInterface;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{

    private $bookRepository;
    private $categoryRepository;

    public function __construct(BookInterface $bookRepository, CategoryInterface $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookRepository->GetAll();
        return view('book/index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->categoryRepository->GetList();
        return view('book/create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            // 'author' => ['required', 'string'],
        ]);

        // dd($request->all());

        $this->bookRepository->Create($request->all());

        return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response($book, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book/edit', [
            'book' => $book,
            'category' => $this->categoryRepository->GetList()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
        ]);

        $update = $this->bookRepository->Update($book->id, [
            'author' => $request->author,
            'title' => $request->title,
            'id_category' => $request->id_category
        ]);

        return Redirect::route('book.index')->with('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->bookRepository->Delete($book->id);
        return Redirect::route('book.index')->with('category');
    }
}
