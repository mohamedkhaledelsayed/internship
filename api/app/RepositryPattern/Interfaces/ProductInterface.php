<?php

namespace App\RepositryPattern\interfaces;

interface ProductInterface {
    public function allProducts();
    public function getProduct($id);
    public function storeProduct($request);
    public function updateProduct($request, $id);
    public function deleteProduct($id);
}