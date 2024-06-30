<?php

namespace App\Services;

use App\Repository\AuthorRepositoryInterface;

class AuthorService
{

    public function __construct(
        protected AuthorRepositoryInterface $authorRepository)
    { }

    public function index()
    {
        return $this->authorRepository->index();
    }

    public function store($request)
    {
        return $this->authorRepository->store($request);
    }

    public function show($authorId)
    {
        return $this->authorRepository->show($authorId);
    }

    public function update($request, $authorId)
    {
        return $this->authorRepository->update($request, $authorId);
    }

    public function destroy($author)
    {
        return $this->authorRepository->destroy($author);
    }
}
