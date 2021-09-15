<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateHospitalRequest;
use App\Models\Hospitals;
use App\Models\Buildings;
use App\Models\Floors;
use App\Models\Rooms;
use App\Models\Roles;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Illuminate\Support\Facades\DB;

class HospitalsController extends Controller
{
    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $hospitals = Hospitals::with('roles')->get();
        $hospitals = Hospitals::all();

        return view('hospitals.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('SuperAdmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('hospitals.create');

        //
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBuilding($id)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFloor()
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRoom()
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitals = Hospitals::create([
            'name' => $request->name,
            'location' => $request->location,
            ]);

        
        Session::flash('message-success', 'The hospital has been created'); 
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hospitals $hospital)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        
        // $buildings = Buildings::all();

        $buildings = DB::select('SELECT * FROM `buildings` WHERE hospitals_id = '.$hospital->id);

        $arrayFloors = array(count($buildings));
        // var_dump($arrayFloors);
        $count_index = 0;

        $arrayRooms = array();


        foreach($buildings as $building)
        {
            $floors = DB::select('SELECT * FROM `floors` WHERE buildings_id = '.$building->id);
            $arrayFloors [$count_index] = count($floors);
            $count_index = $count_index + 1;
            // $count_index_room = 0;


            // foreach($floors as $floor)
            // {
            //     $rooms = DB::select('SELECT * FROM `rooms` WHERE `floors_id` = '.$floor->id);
            //     $count_index_room += count($rooms);

                
            //     // $arrayRooms.push(count($floors));
            // }

            // array_push($arrayRooms,$count_index_room);
            // $count_index_room = 0;

            // array_push($arrayIdBuilding,count($floors));
        }

        // var_dump($arrayRooms);

        // $arrayfloors = array(count($buildings));
        // var_dump($arrayfloors);
        // $count_index = 0;
        // foreach($buildings as $building)
        // {
        //     $floors = DB::select('SELECT * FROM `rooms` WHERE floors_id = '.$building->id);
        //     $arrayfloors [$count_index] = count($floors);
        //     $count_index += 1;
        //     // array_push($arrayIdBuilding,count($floors));
        // }

        // $buildings->Floors->each(function($komen) {
        //     // do foo here
        //     dump($komen);
        // });

        // $floors = DB::select('SELECT * FROM `floors` WHERE buildings_id = '.$hospital->id);

        // $rooms = DB::select('SELECT * FROM `rooms` WHERE hospitals_id = '.$hospital->id);


        // var_dump($buildings);
        // var_dump($hospital->id);


        return view('hospitals.show', compact('hospital','buildings','arrayFloors',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospitals $hospital)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $roles = Roles::pluck('title', 'id');

        // $user->load('roles');
        return view('hospitals.edit', compact('hospital'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHospitalRequest $request, Hospitals $hospital)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospital->update($request->validated());
        // $user->roles()->sync($request->input('roles', []));

        return redirect()->route('hospitals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospitals $hospital)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospital->delete();

        return redirect()->route('hospitals.index');
    }

}
