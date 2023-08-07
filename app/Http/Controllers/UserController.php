<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $user;

    function __construct(UserRepositoryInterface $interface)
    {
        $this->user = $interface;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $this->user->store($request->all());

        return redirect()->route('users.index')->with('success','User has been created successfully.');
    }

    public function show($id)
    {
        $user = $this->user->show($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = $this->user->edit($id);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $this->user->update($request->all(), $id);

        return redirect()->route('users.index')->with('success','User Has Been updated successfully');
    }

    public function destroy($id)
    {
        $this->user->delete($id);
        return redirect()->route('users.index')->with('success','User has been deleted successfully');
    }
}
