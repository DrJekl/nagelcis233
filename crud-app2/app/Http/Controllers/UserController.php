<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(10);
        return view("users.index", ["users" => $users]);
    }

    public function create(Request $request)
    {
        if ($request->user()->cannot("create", User::class)) {
            return redirect()->route("products.index")->with("error", "You do not have permission to view this page");
        }
        $user = new User;
        $user->role = "viewer";
        return view("users.create", ["user" => $user]);
    }
     public function store(Request $request)
    {
        User::create($this->validatedData($request));
        return redirect()->route("users.index")->with("success", "User was added");
    }
      public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view("users.edit", ["user" => $user]);
    }

    public function update(Request $request, string $id)
    {
        User::find($id)->update($this->validatedData($request));
        return redirect()->route("users.index")->with("success", "User was updated");
    }

    public function destroy(string $id): RedirectResponse
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route("users.index")->with("success", "User was deleted");
    }

    private function validatedData($request) {
        return $request->validate(
            ["name" => "required",
            "email" => "required"]
        );
    }
}
