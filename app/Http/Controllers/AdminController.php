<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        return view("admin.account.index",[
            "admin" => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.account.create");
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
            "username" => "required|unique:admins,username",
            "password" => "required|min:8|confirmed",
            "password_confirmation" => "required"
        ]);

        $data = $request->except("password_confirmation","_token");
        $data["password"] = Hash::make($request->password);

        Admin::create($data);
        return redirect()->route("account.admin")->with("admin_create","Berhasil membuat user baru!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view("admin.account.edit",[
            "admin" => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:50",
            "username" => "required|unique:users,username,".$id,
            "password" => "confirmed",
        ]);

        $admin = Admin::findOrFail($id);
        $data = $request->all();
        $data["password"] = $admin->password;
        if ($request->password != "") {
            $data["password"] = Hash::make($request->password);
        }

        $admin->update($data);
        return redirect()->route("account.admin")->with("admin_update","Berhasil mengupdate admin!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route("account.admin")->with("admin_delete","Berhasil menghapus admin!");
    }
}
