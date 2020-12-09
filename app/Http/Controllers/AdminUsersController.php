<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageUsersRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('profile')->simplePaginate(10);
        return view('admin.users.index',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageUsersRequest $request)
    {
//        Try Catch with exception
        $user_image = $request->image;
        $user_image_name = time() . $user_image->getClientOriginalName();
        $user_image->move('uploads/users/images', $user_image_name);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'image' => '/uploads/users/images/' . $user_image_name,
        ]);

        $request->session()->flash('user_created', 'User has been created');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('profile')->firstOrFail();
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
        return redirect()->back();
    }
}
