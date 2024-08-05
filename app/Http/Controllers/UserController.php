<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        
        ]);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = new UserResource($user);

        return response()->json(["user"=>$user,"status"=>200],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $user = User::findorFail($id);
        return view('backend.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request);
        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = $data['password'] ? bcrypt($data['password']) : $user->password;

        $isSame = (
            $user->name === $data['name'] &&
            $user->email === $data['email'] &&
            $user->password === $data['password']
        );

        if ($isSame) {
            return redirect()->route('users.edit', $user->id)
                ->with('info', 'No changes were made.');
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted successfully.');
    }
}
