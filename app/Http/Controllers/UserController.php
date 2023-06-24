<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function makeAdmin($id) {
        // Get the User
        $user = User::find($id);

        // Check if the user is authenticated
        if (Auth::user()) {
            $user->is_admin = true;
            $user->save();

            return back()->with('success', 'User has been made admin successfully.');
        }

        return back()->with('error', 'You do not have permission to perform this action.');
    }


    public function someMethod()
    {
        if (!auth()->user()) {
            // No user is logged in
            abort(403);
        }

        if (!auth()->user()->is_admin) {
            // User is not an admin
            abort(403);
        }
        return view('admin');
        // The rest of the controller method
    }

    public function index() {
        return view('users.index')->with('users', User::all());
    }
}
