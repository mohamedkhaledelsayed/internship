<?php

namespace App\Http\Controllers\author;

use Illuminate\Http\Request;
use App\Services\AuthorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorsRequest;

class AuthorsController extends Controller
{

    public function __construct( protected AuthorService $authorService)
    {
    }

    public function index()
    {
        return $this->authorService->index();
    }
    public function store (AuthorsRequest $request)
    {
        $validated=$request->validated();
        return $this->authorService->store($request);
    }
    public function show($id)
    {
        return $this->authorService->show($id);
    }
    public function destroy($id)
    {
        return $this->authorService->destroy($id);
    }
    public function update(AuthorsRequest $request, $id)
    {
        $validated=$request->validated();
        return $this->authorService->update($request, $id);
    }
}