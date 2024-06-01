<?php
namespace app\Repository;

use App\Http\Requests\UserRequest;

interface UserInterface
{
    public function index();

    public function create();

    public function store( UserRequest $request);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}