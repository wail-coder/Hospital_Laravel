<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\NotifyRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Session;
use App\Notifications\alarmNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Groups_Buildings_Floors_Rooms;
use App\Models\Groups;
use App\Models\Users_Groups;
use App\Models\Rooms;

class UserController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard(Request $request)
    {
        // abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $users = User::with('roles')->get();
        // $users = User::all();
        // var_dump($users);
        $user = Auth::user();
        // $user->notify(new alarmNotification());
        // $room_groups = Groups_Buildings_Floors_Rooms;
        $groups_id = DB::select('SELECT `groups_id`  FROM `users_groups` WHERE `users_id`= '.$user->id);
        // var_dump($groups_id);
        $groups_id= json_decode( json_encode($groups_id), true);
        $groups = Groups::find($groups_id);
        // echo $groups[0]->id;
        // echo $groups[0]->name;

        if(count($groups) > 0)
        {
            $rooms_id = DB::select('SELECT `rooms_id` FROM `groups_buildings_floors_rooms` WHERE `groups_id`= '.$groups[0]->id);
            $rooms_id= json_decode( json_encode($rooms_id), true);
            // var_dump($rooms_id);
            $rooms = Rooms::findMany($rooms_id);
        }
        else
        {
            $rooms = [];
        }

        // $error = $request->session()->get('error_room_value');
        
        return view('dashboard')->with('notifications', $user->notifications)->with('rooms',$rooms);
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendNotifications(NotifyRequest $request )
    {

        
        $user = Auth::user();
        // $user->notify(new alarmNotification());
        // $room_groups = Groups_Buildings_Floors_Rooms;
        $groups_id = DB::select('SELECT `groups_id`  FROM `users_groups` WHERE `users_id`= '.$user->id);
        // var_dump($groups_id);
        // $groups_id= json_decode(json_encode($groups_id), true);
        // var_dump($groups_id);
        $users_id = DB::select('SELECT `users_id`  FROM `users_groups` WHERE `groups_id`= '.$groups_id[0]->groups_id);
        // $users_id= json_decode(json_encode($users_id), true);

        $room_value= json_decode(json_encode($request->room_value), true);
        $code_value= json_decode(json_encode($request->input('value')), true);

        if($room_value == "")
        {
            // $request->session()->put('error_room_value', "you have to select room");
        }
        else
        {
            // var_dump($code_value);
        foreach($users_id as $user_id)
        {
            $user = User::find($user_id->users_id);
            $arr = [ 'Code' => $code_value , 'Room' => $room_value ];
            $user->notify(new alarmNotification($arr));
        }
        // $groups = Groups::find($groups_id);
        // // echo $groups[0]->id;
        // // echo $groups[0]->name;

        // $rooms_id = DB::select('SELECT `rooms_id` FROM `groups_buildings_floors_rooms` WHERE `groups_id`= '.$groups[0]->id);
        // $rooms_id= json_decode( json_encode($rooms_id), true);

        // $rooms = Rooms::findMany($rooms_id);
        }

        return redirect()->route('dashboard');

       

        // return view('dashboard')->with('notifications', $user->notifications)->with('rooms',$rooms);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteNotifications(Request $request )
    {

        echo "wail";
        // $user = Auth::user();
        // $groups_id = DB::select('SELECT `groups_id`  FROM `users_groups` WHERE `users_id`= '.$user->id);
        // $users_id = DB::select('SELECT `users_id`  FROM `users_groups` WHERE `groups_id`= '.$groups_id[0]->groups_id);
        // $room_value= json_decode(json_encode($request->input('room_value')), true);
        // $code_value= json_decode(json_encode($request->input('value')), true);

        // var_dump($code_value);
        // foreach($users_id as $user_id)
        // {
        //     $user = User::find($user_id->users_id);
        //     $arr = [ 'Code' => $code_value , 'Room' => $room_value ];
        //     $user->notify(new alarmNotification($arr));
        // }

        // return redirect()->route('dashboard');
    }

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
