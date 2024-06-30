<?php

namespace App\Repository;

interface AuthorRepositoryInterface
{
    public function index();

    public function store($request);

    public function show($authorId);

    public function update($request,$authorId);

    public function destroy($author);
}
