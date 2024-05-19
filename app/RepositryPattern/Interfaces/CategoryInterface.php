<?php

namespace App\RepositryPattern\Interfaces;

interface CategoryInterface {

    public function allCategories();

    public function getCategory($id);

    public function storeCategory($request);

    public function updateCategory($request, $id);

    public function deleteCategory($id);
}
