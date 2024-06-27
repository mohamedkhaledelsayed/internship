<?php

namespace App\Repository;

interface CategoryRepositoryInterface
{
    public function index();

    public function store($request);

    public function show($category);

    public function update($request,$category);

    public function destroy($category);
}
