<?php
namespace App\Repository;
use App\Models\Books;
use Illuminate\Http\Response;
use App\Http\Resources\BooksResource;
use App\Repository\BookRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookRepository implements BookRepositoryInterface
{
    public function index()
    {
        $books = Books::with('authors')->get();
        return BooksResource::collection($books);
    }

    public function store($request)
    {
        $books = Books::create($request->all());
        return response (new BooksResource($books), 201);
    }

    public function show($bookID)
    {
        try {
            $book = Books::findOrFail($bookID);
            return new BooksResource($book);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    public function update($request, $book)
    {
        try {
            $book = Books::findOrFail($book);
            $book->update($request->all());
            return new BooksResource($book);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    public function destroy($book)
    {
        try {
            Books::findOrFail($book)->destroy($book);
            return response("Deleted successfully", Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Author not found.'], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete author.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}