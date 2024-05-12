<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::latest('id')->get();
        return view('admin.dashboard', compact('users'));
    }
    public function create(){
        $title = "Añadir nuevo usuario";
        return view('admin.add_edit_user', compact('title'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'position' => 'required',
                'salary' => 'required',
                'email' => 'required|email|unique:users',
                'photo' => 'mimes:png,jpeg,jpg|max:2048'
            ]
        );
        $filePath = public_path('uploads');
        $insert = new User();
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->position = $request->position;
        $insert->salary = $request->salary;
        $insert->password = bcrypt('password');
        
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $file_name = time() . $file->getClientOriginalName();
 
            $file->move($filePath, $file_name);
            $insert->photo = $file_name;
        }
        $result = $insert->save();
        return redirect()->route('admin.dashboard')->with('success', 'Usuario creado exitosamente!');
    }
    public function edit($id)
    {
        $title = "Actualizar Usuario";
        $edit = User::findOrFail($id);
        return view('admin.add_edit_user', compact('edit', 'title'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'position' => 'required',
                'salary' => 'required',
                'photo' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );
        $update = User::findOrFail($id);
        $update->name = $request->name;
        $update->position = $request->position;
        $update->salary = $request->salary;
        $update->email = $request->email;
 
        if ($request->hasfile('photo')) {
            $filePath = public_path('uploads');
            $file = $request->file('photo');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);

            if (!is_null($update->photo)) {
                $oldImage = public_path('uploads/' . $update->photo);
                if (File::exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $update->photo = $file_name;
        }
 
        $result = $update->save();
        return redirect()->route('admin.dashboard')->with('success', 'Usuario actualizado exitosamente!');
    }
    public function destroy(Request $request)
    {
        $userData = User::findOrFail($request->user_id);
        $userData->delete();
        // delete photo if exists
        if (!is_null($userData->photo)) {
            $photo = public_path('uploads/' . $userData->photo);
            if (File::exists($photo)) {
                unlink($photo);
            }
        }
        return redirect()->route('admin.dashboard')->with('success', 'Usuario eliminado exitosamente!');
    }
}
