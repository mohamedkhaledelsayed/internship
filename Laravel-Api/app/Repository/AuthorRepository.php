<?php
namespace App\Repository;

use App\Models\Authors;
use App\Mail\AuthorCreate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\AuthorsResource;
use App\Repository\AuthorRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function index()
    {
        $author=Authors::all();
        return AuthorsResource::collection($author);
    }

    public function store($request)
    {
        $author = Authors::create($request->all());
        Mail::to('admin@example.com')->send(new AuthorCreate($author));
        return response (new AuthorsResource($author), 201);
    }

    public function show($authorId)
    {
        try {
            $author = Authors::findOrFail($authorId);
            return new AuthorsResource($author);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Author not found.'], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch author.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update($request, $author)
    {
        try {
            $author = Authors::findOrFail($author);
            $author->update($request->all());
            return response(new AuthorsResource($author), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Author not found.'], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update author.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function destroy($authorId)
    {
        try {
            Authors::findOrFail($authorId)->destroy($authorId);
            return response("Deleted successfully", Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Author not found.'], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete author.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}