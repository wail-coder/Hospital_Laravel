<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddBuildingRequest_FirstStep;
use App\Http\Requests\AddBuildingRequest_SecondStep;
use App\Http\Requests\AddBuildingRequest_ThirdStep;
use App\Models\Hospitals;
use App\Models\Buildings;
use App\Models\Floors;
use App\Models\Rooms;
use Illuminate\Support\Facades\Gate;
use App\Models\Roles;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;

class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $buildings = Buildings::all();

        return view('buildings.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $hospital = Hospitals::findOrFail($id);
        $building = Buildings::latest()->first();
        // var_dump($building->id);
        return view('buildings.create',compact('hospital','building'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFirstStep($id)
    {
        $hospital = Hospitals::findOrFail($id);
        $building = Buildings::latest()->first();
        // var_dump($building->id);
        return view('buildings.create_step1',compact('hospital','building'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSecondStep(Request $request, $id)
    {
        // $id = $request->session()->get('hospital_id');
        // $building_number = $request->session()->get('building_number');
        $floor_number = $request->session()->get('floors_number');

        $hospital = Hospitals::findOrFail($id);
        // $building = Buildings::latest()->first();
        // var_dump($building->id);
        return view('buildings.create_step2',compact('hospital','floor_number'));
    }


    public function createThirdStep(Request $request, $id)
    {
        $floor_number = $request->session()->get('floors_number');
        $room_number = $request->session()->get('room_numbers');

        // var_dump($floor_number);

        $floor_number = (int)$floor_number;

        // $room_number = $request->session()->get('room_number');

        $hospital = Hospitals::findOrFail($id);
        return view('buildings.create_step3',compact('hospital','room_number','floor_number'));
    }

    public function createLastStep(Request $request, $id)
    {
        $floor_number = $request->session()->get('floors_number');
        $room_numbers = $request->session()->get('room_numbers');
        $room_number = $request->session()->get('room_number');
        $building_number = $request->session()->get('building_number');
        $building_name = $request->session()->get('building_name');
        $building_location = $request->session()->get('building_location');

        // var_dump($building_number);
        // var_dump($room_numbers);
        // var_dump($room_number);
        // var_dump($floor_number);

        // $room_number = $request->session()->get('room_number');

        $hospital = Hospitals::findOrFail($id);
        return view('buildings.create_last_step',compact('hospital','room_number','floor_number'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFirstStep(AddBuildingRequest_FirstStep $request, $id)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $floor_number = $request->floor_number;
        // if($floor_number > 0)
        // {
            // $request->session()->put('hospital_id', $id);
            $request->session()->put('building_number', $request->building_number);
            $request->session()->put('building_name', $request->building_name);
            $request->session()->put('building_location', $request->building_location);
            $request->session()->put('floors_number', $request->floor_number);



            return redirect()->route('buildings.createSecondStep',$id);
            // ->with('building_number', $request->building_number)
            // ->with('floor_number', $floor_number);        
        // }
        // else
        // {
            // $building = Buildings::create([
            //     'name' => $request->name,
            //     'hospitals_id' => $id,
            //     'number' =>  $request->building_number,
            //     // 'location' => $request->location,
            //     ]);

            // $buildings = Buildings::latest()->first();
        
            // Session::flash('message-success', 'The building has been created'); 
            // return \Redirect::route('hospitals.show', $id);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSecondStep(AddBuildingRequest_SecondStep $request, $id)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $room_number = $request->room_number;
        $request->session()->put('floor_number', $request->floor_number);
        $request->session()->put('floor_name', $request->floor_name);
        $request->session()->put('floor_location', $request->floor_location);
        $request->session()->put('room_numbers', $request->room_number);

        // $floor_number = $request->session()->get('floor_number');
        // $request->session()->put('room_number', $request->room_number);

        // echo $request->get('floor_location')[0];

        return redirect()->route('buildings.createThirdStep',$id);



       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRoomStep(AddBuildingRequest_ThirdStep $request, $id)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $room_number = $request->room_number;

        $floor_number = $request->session()->get('floor_number');
        $request->session()->put('room_name', $request->room_name);
        $request->session()->put('room_number', $request->room_number);

        // echo $request->get('floor_location')[0];

        return redirect()->route('buildings.createLastStep',$id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLastStep(Request $request, $id)
    {
        $building_number = $request->session()->get('building_number');
        $building_name = $request->session()->get('building_name');
        $floors_number = $request->session()->get('floors_number');
        $floors_number = (int)$floors_number;
        $floor_number = $request->session()->get('floor_number');
        $floor_name = $request->session()->get('floor_name');
        $floor_location = $request->session()->get('floor_location');
        $room_numbers = $request->session()->get('room_numbers');
        $room_name = $request->session()->get('room_name');
        $room_number = $request->session()->get('room_number');
        // $room_numbers = (int)$room_numbers;


        // $Building_values = array('number' => $building_number,'name' => $building_name,'hospitals_id' => $id);
        // DB::table('Buildings')->insert($Building_values);

        $Buildings = new Buildings;
        $Buildings->number = $building_number;
        $Buildings->name = $building_name;
        $Buildings->hospitals_id = $id;
        $Buildings->save();

        $count = 0;
        // var_dump($floor_number);


        for($i = 0; $i < $floors_number; $i++)
        {
            $Floors = new Floors;
            $Floors->number = $floor_number[$i];
            $Floors->name = $floor_name[$i];
            $Floors->buildings_id = $Buildings->id;
            $Floors->save();
            $room_numbers_integer = $room_numbers[$i];
            $room_numbers_integer = (int)$room_numbers_integer;

            for($j = $count; $j < $room_numbers_integer+$count; $j++)
            {
                $Rooms = new Rooms;
                $Rooms->number = $room_number[$j];
                $Rooms->name = $room_name[$j];
                $Rooms->floors_id = $Floors->id;
                $Rooms->save();
            }
            $count = $room_numbers_integer+$count;
        }
        // $Floors = new Floors;
        // $Floors->number = $building_number;
        // $Floors->name = $building_name;
        // $Floors->hospitals_id = $id;
        // $Buildings->save();

        // $Buildings = new Buildings;
        // $Buildings->number = $building_number;
        // $Buildings->name = $building_name;
        // $Buildings->hospitals_id = $id;
        // $Buildings->save();

        // $buildings = Buildings::latest()->first();
        
        Session::flash('message-success', 'The building has been created'); 
        return \Redirect::route('buildings.index', array('buildings' => $Buildings));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBuildingRequest_FirstStep $request, $id)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // var_dump($id);

        $building = Buildings::create([
            'name' => $request->name,
            'hospitals_id' => $id,
            'number' =>  $request->building_number,
            // 'location' => $request->location,
            ]);

        // $hospital = Hospitals::findOrFail($id);

            
        // $building->hospitals;

        // $hospitals = Hospitals::findOrFail($id);
        $buildings = Buildings::latest()->first();
        
        Session::flash('message-success', 'The building has been created'); 
        return \Redirect::route('buildings.index', array('buildings' => $buildings));
        // return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building = Buildings::findOrFail($id);

        $floors = DB::select('SELECT * FROM `floors` WHERE buildings_id = '.$id);

        $arrayRooms = array(count($floors));
        $count_index = 0;

        foreach($floors as $floor)
        {
            $rooms = DB::select('SELECT * FROM `rooms` WHERE floors_id = '.$floor->id);
            $arrayRooms [$count_index] = count($rooms);
            $count_index = $count_index + 1;

        }

        return view('buildings.show', compact('building','floors','arrayRooms'));
    }

    public function showFloors($id)
    {
        $floor = Floors::findOrFail($id);

        $rooms = DB::select('SELECT * FROM `rooms` WHERE floors_id = '.$floor->id);

        return view('floors.show', compact('floor','rooms'));
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
    public function destroy($id_hospital, $id_building)
    {
        abort_if(Gate::denies('Admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // echo $id_h;
        // echo $id_b;
        $building = Buildings::findOrFail($id_building);
        $building->delete();

        return redirect()->route('hospitals.show',$id_hospital);
    }
}
