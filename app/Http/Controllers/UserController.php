<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view("admin.user.index",[
            "user" => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:50",
            "username" => "required|unique:users,username",
            "password" => "required|min:8|confirmed",
            "password_confirmation" => "required"
        ]);

        $data = $request->except("password_confirmation","_token");
        $data["password"] = Hash::make($request->password);
        
        User::create($data);
        return redirect()->route("account.user")->with("user_create","Berhasil membuat user baru!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("admin.user.edit",[
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:50",
            "username" => "required|unique:users,username,".$id,
            "password" => "confirmed",
        ]);

        $user = User::findOrFail($id);
        $data = $request->all();
        $data["password"] = $user->password;
        if ($request->password != "") {
            $data["password"] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route("account.user")->with("user_updated","Berhasil mengupdate user baru!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route("account.user")->with("user_deleted","Berhasil menghapus user baru!");
    }
}
