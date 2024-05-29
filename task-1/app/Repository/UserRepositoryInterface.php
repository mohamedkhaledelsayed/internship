<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function show($user);

    public function edit($user);

    public function update($request,$user);

    public function destroy($user);
}
