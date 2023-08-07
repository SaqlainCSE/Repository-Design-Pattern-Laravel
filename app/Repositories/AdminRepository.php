<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository implements AdminInterface {

    public function all()
    {
        return Admin::get();
    }

    public function get($id)
    {
        return Admin::find($id);
    }

    public function store(array $data)
    {
        return Admin::create($data);
    }

    public function update($id, array $data)
    {
        return Admin::find($id)->update($data);
    }

    public function delete($id)
    {
        return Admin::destroy($id);
    }
}
