<?php
namespace App\Http\Controllers\books;

use Illuminate\Http\Request;

use App\Services\BookService;
use App\Http\Requests\BooksRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBooksRequest;

class BooksController extends Controller
{
    public function __construct( protected BookService $booksService )
    {}

    public function index()
    {
        return $this->booksService->index();
    }

    public function store(BooksRequest $request)
    {
        $validated=$request->validated();
        return $this->booksService->store($request);
    }
    public function show ($id)
    {
        return $this->booksService->show($id);
    }

    public function update(UpdateBooksRequest $request, $id)
    {
        $validated=$request->validated();
        return $this->booksService->update($request, $id);
    }
    public function destroy($id)
    {
        return $this->booksService->destroy($id);
    }
}
