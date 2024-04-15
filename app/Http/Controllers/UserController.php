<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // Add more validation rules as needed
        ]);

        // Create new user
        $user = User::create($validatedData);

        // Redirect to user's profile page
        return redirect()->route('users.show', $user->id);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            // Add more validation rules as needed
        ]);

        // Update user
        $user = User::findOrFail($id);
        $user->update($validatedData);

        // Redirect to user's profile page
        return redirect()->route('users.show', $user->id);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect to user listing page
        return redirect()->route('users.index');
    }
}
?>