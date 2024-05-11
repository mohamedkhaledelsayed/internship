<?php

namespace app\Repositories\Product;

use Illuminate\Support\Facades\Request;

interface Productinterface
{

    public function index();
    public function show($id);
    public function create();
    public function store(array $data, string $imageName);
    public function edit($id);
    public function update(array $data, $imageName, $id);
    public function destroy($request, $id);
}
