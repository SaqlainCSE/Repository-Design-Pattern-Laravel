<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface {

    public function all()
    {
        return User::get();
    }

    public function store(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function edit($id)
    {
        return User::find($id);
    }

    public function update(array $data, $id)
    {
        $user = User::find($id);

        return $user->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);

        return $user->delete();
    }
}
