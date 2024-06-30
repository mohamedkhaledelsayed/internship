<?php

namespace App\Services;

use App\Repository\BookRepositoryInterface;

class BookService
{

    public function __construct(
        protected BookRepositoryInterface $bookRepository)
    { }

    public function index()
    {
        return $this->bookRepository->index();
    }

    public function store($request)
    {
        return $this->bookRepository->store($request);
    }

    public function show($bookID)
    {
        return $this->bookRepository->show($bookID);
    }

    public function update($request, $bookID)
    {
        return $this->bookRepository->update($request, $bookID);
    }

    public function destroy($book)
    {
        return $this->bookRepository->destroy($book);
    }
}
