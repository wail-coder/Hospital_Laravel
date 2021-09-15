<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospitals;
use App\Models\Buildings;
use App\Models\Floors;
use App\Models\Rooms;
use App\Models\Roles;
use App\Models\Groups;
use App\Models\Users_Groups;
use App\Models\Groups_Buildings_Floors_Rooms;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groups = Groups::all();

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('groups.create');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFirstStep()
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('groups.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSecondStep()
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('groups.create_step2',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createThirdStep(Request $request)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::findMany($request->session()->get('user_id'));

        return view('groups.create_step3',compact('users'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeFirstStep(Request $request)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->session()->put('group_name', $request->group_name);
        $request->session()->put('group_number', $request->group_number);

        return redirect()->route('groups.createSecondStep');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeSecondStep(Request $request)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->session()->put('user_id', $request->input('user_value'));


        return redirect()->route('groups.createThirdStep');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeThirdStep(Request $request)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $Groups = new Groups;
        $Groups->number = $request->session()->get('group_number');
        $Groups->name = $request->session()->get('group_name');
        $Groups->save();

        $users = User::findMany($request->session()->get('user_id'));

        foreach($users as $user)
        {
            $Users_Groups = new Users_Groups;
            $Users_Groups->groups_id =  $Groups->id;
            $Users_Groups->users_id = $user->id;
            $Users_Groups->save();
        }
        
        return redirect()->route('groups.index');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $groups = Groups::findOrFail($id);
        $users_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        $users_id= json_decode( json_encode($users_id), true);
        $users = User::findMany($users_id);
        return view('groups.show',compact('groups','users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignFirstStep($id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $groups = Groups::findOrFail($id);
        // $data = array();
        $users_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        $users_id= json_decode( json_encode($users_id), true);
        $users = User::findMany($users_id);
        $buildings = Buildings::all();
        return view('groups.assign',compact('groups','users','buildings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeAssignFirstStep(Request $request,$id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->session()->put('building_id', $request->input('building_value'));
        // $Groups->name = $request->session()->get('group_name');

        
        $groups = Groups::findOrFail($id);
        // $buildings = Build
        // $buildings_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        // $buildings_id= json_decode( json_encode($buildings_id), true);
        // $users = User::findMany($users_id);

        return redirect()->route('groups.assignSecondStep',$groups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignSecondStep(Request $request,$id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $groups = Groups::findOrFail($id);
        // $data = array();
        $floors = DB::select('SELECT * FROM `floors` WHERE buildings_id = '.$request->session()->get('building_id')[0]);
        $users_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        $users_id= json_decode( json_encode($users_id), true);
        $users = User::findMany($users_id);
        // $buildings = Buildings::all();
        return view('groups.assign_step2',compact('groups','floors','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeAssignSecondStep(Request $request,$id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->session()->put('floor_id', $request->input('floor_value'));
        // $Groups->name = $request->session()->get('group_name');

        
        $groups = Groups::findOrFail($id);
        // $buildings = Build
        // $buildings_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        // $buildings_id= json_decode( json_encode($buildings_id), true);
        // $users = User::findMany($users_id);

        return redirect()->route('groups.assignThirdStep',$groups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignThirdStep(Request $request,$id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $groups = Groups::findOrFail($id);
        // $data = array();
        $rooms = DB::select('SELECT * FROM `rooms` WHERE floors_id = '.$request->session()->get('floor_id')[0]);
        $users_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        $users_id= json_decode( json_encode($users_id), true);
        $users = User::findMany($users_id);
        // $buildings = Buildings::all();
        return view('groups.assign_step3',compact('groups','rooms','users'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeAssignThirdStep(Request $request,$id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->session()->put('room_id', $request->input('room_value'));
        // $Groups->name = $request->session()->get('group_name');

        
        $groups = Groups::findOrFail($id);
        // $buildings = Build
        // $buildings_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        // $buildings_id= json_decode( json_encode($buildings_id), true);
        // $users = User::findMany($users_id);

        return redirect()->route('groups.assignConfirmStep',$groups);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignConfirmStep(Request $request,$id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $groups = Groups::findOrFail($id);
        $users_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        $users_id= json_decode( json_encode($users_id), true);
        $users = User::findMany($users_id);


        $building = Buildings::find($request->session()->get('building_id')[0]);
        $floor = Floors::find($request->session()->get('floor_id')[0]);
        $rooms = Rooms::findMany($request->session()->get('room_id'));

       

        // var_dump($rooms);

        return view('groups.confirm_assign',compact('groups','users','building','floor','rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeAssignConfirmStep(Request $request,$id)
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $groups = Groups::findOrFail($id);
        // $data = array();
        // $rooms = DB::select('SELECT * FROM `rooms` WHERE floors_id = '.$request->session()->get('floor_id')[0]);
        // $users_id = DB::select('SELECT `users_id` FROM `users_groups` WHERE groups_id = '.$id);
        // $users_id= json_decode( json_encode($users_id), true);
        // $users = User::findMany($users_id);

        // $building_number = DB::select('SELECT `number` FROM `buildings` WHERE id = '.$request->session()->get('building_id')[0]);

        $building = Buildings::find($request->session()->get('building_id')[0]);
        $floor = Floors::find($request->session()->get('floor_id')[0]);
        $rooms = Rooms::findMany($request->session()->get('room_id'));


        foreach($rooms as $room)
        {
            $groups_rooms = new Groups_Buildings_Floors_Rooms;
            $groups_rooms->groups_id =  $groups->id;
            $groups_rooms->buildings_id =  $building->id;
            $groups_rooms->floors_id =  $floor->id;
            $groups_rooms->rooms_id =  $room->id;
            $groups_rooms->save();
        }


        // $floor_number= json_decode( json_encode($floor_number), true);
        // $rooms= json_decode( json_encode($rooms), true);

        // var_dump($rooms)

        return redirect()->route('groups.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
