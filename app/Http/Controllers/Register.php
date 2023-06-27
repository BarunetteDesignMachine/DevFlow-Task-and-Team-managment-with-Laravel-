<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use function Termwind\render;
use App\Models\User;
use App\Models\Group;

class Register extends BaseController
{

    public function index(){
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate request
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'email' => 'required',
            'phone_number' => 'required',
            'contact' => 'required',
            'group_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create user
        $user = User::create($validatedData);

        // Handle image upload
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->storeAs('images', $image->getClientOriginalName());
                $user->image = $path;
                $user->save();
        } } catch (\Exception $e) {
            // Do nothing
        }
        // Update the group user count for the specified group
        $group = Group::find($validatedData['group_id']);
        if ($group) {
            $group->group_users++;
            $group->save();
        }

        return redirect()->route('success');
    }
//    public function destroy($id)
//    {
//        // Find the user to be deleted
//        $user = User::find($id);
//
//        // Find the corresponding group
//        $group = Group::find($user->group_id);
//
//        // Decrement the group user count and save the changes
//        if ($group) {
//            $group->user_count--;
//            $group->save();
//        }
//
//        // Delete the user
//        $user->delete();
//
//        return redirect()->route('success');
//    }

    public function success()
    {
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return view('home');
    }
}
