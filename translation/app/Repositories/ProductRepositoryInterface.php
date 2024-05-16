<?php
namespace App\Repositories;


interface ProductRepositoryInterface
{
    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function find(int $id);

    public function all();

    public function validation($request);
}
