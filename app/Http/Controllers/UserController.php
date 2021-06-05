<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with('roles')->get();
        // $users = User::all();
        // var_dump($users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('users.create');

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'job_title' => $request->job_title,
            'password' => bcrypt($request->password),
            'password_status' => 1,
            ]);

        
        Session::flash('message-success', 'The user has been created'); 
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Roles::pluck('title', 'id');

        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function ResetPassword($id)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::find($id);
    
        $roles = Roles::pluck('title', 'id');

        $user->load('roles');
        return view('users.reset', compact('user', 'roles'));
    }

    public function updatePassword(UpdateUserPasswordRequest  $request, $id)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->all();
        $user = User::find($id);
        $user->password = bcrypt($data['password']);
        $user->password_status = 1;
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return redirect()->route('users.index');
    }
}
