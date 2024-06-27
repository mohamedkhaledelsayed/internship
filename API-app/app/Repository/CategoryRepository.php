<?php

namespace App\Repository;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function index()
    {
        $category= Category::with('Cars')->get();

        return  CategoryResource::collection($category);
    }

    public function store($request)
    {

        $category=Category::create( $request->all());

        return response(new CategoryResource($category),200);
    }

    public function show($category)
    {
        return new CategoryResource($category);
    }

    public function update($request, $category)
    {
        $category->update($request->all());
        return response(new CategoryResource($category),202);
    }

    public function destroy($category)
    {
        $category->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
