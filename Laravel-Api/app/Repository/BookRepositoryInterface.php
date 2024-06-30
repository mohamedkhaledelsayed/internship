<?php

namespace App\Repository;

interface BookRepositoryInterface
{
    public function index();

    public function store($request);

    public function show($authorId);

    public function update($request,$bookId);

    public function destroy($author);
}
