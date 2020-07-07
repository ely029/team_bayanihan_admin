<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Riders;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function riders()
    {
    	$results = DB::select( DB::raw("SELECT * FROM riders") );
        return view('riders_list',['data' => $results]);
    }

    public function addRider(Request $request){
        
        $full_name = $request->request->get('full_name');
        $email = $request->request->get('email');
        $vehicle_model = $request->request->get('vehicle_model');
        $license_number = $request->request->get('license_number');

        Riders::insert(array('full_name' => $full_name,'email'=>$email,'vehicle_model' => $vehicle_model,'license_number' => $license_number));

        return response('true');

    }

    public function updateRider(Request $request)
    {
    	$id = $request->request->get('id');
    	$full_name = $request->request->get('full_name');
    	$vehicle_model = $request->request->get('vehicle_model');
    	$email = $request->request->get('email');
    	$license_number = $request->request->get('license_number');
    	 DB::select( DB::raw("UPDATE riders set 
    	 	full_name='$full_name',
    	 	email='$email',
    	 	vehicle_model='$vehicle_model',
    	 	license_number='$license_number'
    	 	where id = $id ") );
        return response('true');
    }

    
}
