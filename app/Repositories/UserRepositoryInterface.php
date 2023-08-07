<?php
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function all();

    public function store(array $data);

    public function show($id);

    public function edit($id);

    public function update(array $data, $id);

    public function delete($id);
}
