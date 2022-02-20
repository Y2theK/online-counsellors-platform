<?php

namespace App\Http\Controllers\admins;

use App\Models\User;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $image = $request->file('image');
        $imageName = Storage::disk('public')->put('profileImg/', $image);
       
        //default password = password
        $user = User::create(
            $request->validated() +
            ['password' => bcrypt('password')]
        );
        if ($user) {
            $user_detail = UserDetail::create(
                $request->validated() + ['user_id' => $user->id]
                + ['image' => $imageName]
            );
        }
        // dd($user, $user_detail);
        if ($user && $user_detail) {
            return redirect()->route('admin.users.index')->with('info', 'User Created Successfully..!');
        } else {
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        if ($user) {
            $user_detail = UserDetail::where('user_id', $user->id)
            ->update(collect($request->validated())->except(['name','email'])->toArray());
        }
        if ($user && $user_detail) {
            return redirect()->route('admin.users.index')->with('info', 'User Updated Successfully..!');
        } else {
            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user_detail = UserDetail::where('user_id', $user->id)->first();
        Storage::disk('public')->delete($user_detail->image);
        $user_detail->destroy($user_detail->id);
        $user->destroy($user->id);
        return redirect()->route('admin.users.index')->with('info', 'User Deleted Successfully');
    }
}
