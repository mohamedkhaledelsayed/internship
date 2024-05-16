<?php

namespace App\Repository;

use App\Http\Requests\ProductRequest;

interface ProductInterface
{
    public function index();

    public function create();

    public function store(ProductRequest $request);

    public function edit($id);

    public function update( $request,$id);

    public function destroy($id);


}
