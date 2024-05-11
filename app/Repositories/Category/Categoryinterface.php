<?php

namespace app\Repositories\Category;


interface Categoryinterface
{

    public function index();
    public function show($id);
    public function create();
    public function store(array $data);
    public function edit($id);
    public function update(array $data, $id);
    public function destroy($id);
}
