<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.pages.user.index', compact('users'));
    }


    public function addEditUser(Request $request, $id = null)
    {
        if (empty($id)) {
            $userData = [];
            $user = new User;
            $message = "User added successfully.";
        } else {
            $user = User::findOrFail($id);
            $userData = $user->toArray();
            $message = "User updated successfully.";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            ]);

            DB::beginTransaction();
            try {
                 if (empty($id)) {
                    // Create new user
                    $user = User::create([
                        'name' => $data['name'] . ' ' . $data['name'],
                        'email' => $data['email'],
                        'password' => Hash::make(11111111),
                        'role' => 'user',
                    ]);
                } else {
                    // Update user
                    $user->update([
                        'name' => $data['name'] . ' ' . $data['name'],
                        'email' => $data['email'],
                    ]);
                }

                DB::commit();
                Session::flash('success', $message);
                return redirect()->route('userIndex');
            } catch (\Exception $e) {
                DB::rollback();
                return back()->withErrors(['error' => $e->getMessage()]);
            }
        }

        return view('admin.pages.user.add-edit-user', compact('userData'));
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
            Session::flash('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', 'Error deleting user: ' . $e->getMessage());
        }

        return redirect()->back();
    }


}
