<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\AdminInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $admin;

    public function __construct(AdminInterface $interface)
    {
        $this->admin = $interface;
    }

    public function index()
    {
        $admins = $this->admin->all();
        return view('admins.index', ['admins' => $admins]);
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $this->admin->store($request->all());

        return redirect()->route('admins.index')->with('success','Admin has been created successfully.');
    }

    public function show($id)
    {
        $admin = $this->admin->get($id);
        return view('admins.show',compact('admin'));
    }

    public function edit($id)
    {
        $admin = $this->admin->get($id);
        return view('admins.edit',compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $this->admin->update($id, $request->all());
        return redirect()->route('admins.index')->with('success','Admin Has Been updated successfully');
    }

    public function destroy($id)
    {
        $this->admin->delete($id);
        return redirect()->route('admins.index')->with('success','Admin has been deleted successfully');
    }
}
