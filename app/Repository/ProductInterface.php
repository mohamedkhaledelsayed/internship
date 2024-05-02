<?php

namespace App\Repository;

interface ProductInterface
{
    public function index();

    public function create();

    public function store($request);

    
    public function destroy($id);


}
