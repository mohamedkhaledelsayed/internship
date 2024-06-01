<?php
namespace app\Repository ;

interface CategoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function update($request,$id);

    public function destroy($id);

    public function edit($id);




}
