<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'users' => User::all()
        ];

        return view('pages.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'roles' => Role::all()
        ];

        return view('pages.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $store['password'] = bcrypt($store['password']);

        User::create($store);
        Session::flash('success', 'Data berhasil disimpan');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data = [
            'user' => User::find($user->id),
            'roles' => Role::all()
        ];

        return view('pages.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $update = $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
        ]);
        if ($request->password) {
            $update['password'] = bcrypt($request->password);
        }

        User::where('id', $user->id)->update($update);
        Session::flash('success', 'Data berhasil diupdate');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $user::destroy($user->id);
        Session::flash('success', 'Data berhasil dihapus');
        return redirect()->route('user.index');
    }
}
