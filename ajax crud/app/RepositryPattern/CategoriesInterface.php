<?php
namespace App\RepositryPattern;

use Illuminate\Http\Request;

interface CategoriesInterface{
    public function index();
    public function create();
    function store(Request $request);
    public function edit($id);
    public function update(Request $request, $id);
    public function destroy($id);





}
