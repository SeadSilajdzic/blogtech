<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageProfileUpdateRequest;
use App\Http\Requests\ManageUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('profile', [
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = $user = User::where('id', $id)->firstOrFail();
        return view('profile-edit', [
            'user' => $user
        ]);
    }

    public function update(ManageProfileUpdateRequest $request, $id)
    {
        $user = Auth::user();

        if($request->hasFile('image')){

            $image = $request->image;

            $image_new_name = time() . $image->getClientOriginalName();

            $image->move('uploads/users/images/', $image_new_name);

            $user->profile->image = 'uploads/users/images/' . $image_new_name;

            $user->profile->save();

        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if($request->input('password')){
            $user->password = bcrypt($request->password);
        }

        $user->profile->bio = $request->bio;
        $user->profile->address = $request->address;
        $user->profile->primary_phone = $request->primary_phone;
        $user->profile->secondary_phone = $request->secondary_phone;
        $user->profile->facebook = $request->facebook;
        $user->profile->instagram = $request->instagram;
        $user->profile->linkedin = $request->linkedin;
        $user->profile->github = $request->github;
        $user->profile->youtube = $request->youtube;

        $user->save();
        $user->profile->save();

        return redirect()->back();
    }
}
