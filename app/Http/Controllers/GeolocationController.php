<?php

namespace App\Http\Controllers;

use App\Geolocation;
use Illuminate\Http\Request;

class GeolocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showLocation()
    {
        $locationCount = Geolocation::find(1);
        return response()->json($locationCount);
    }

    public function setGeolocation(Request $request)
    {
//        dd($request);
        $this->validate($request,[
            'lng' => 'required',
            'lat' => 'required'
        ]);

        $locationCount = Geolocation::count();
        if ($locationCount > 0){
            $geolocation = Geolocation::find(1);
            $geolocation->lng = $request->lng;
            $geolocation->lat = $request->lat;
            $geolocation->save();
        }else{
            $geolocation = new Geolocation();
            $geolocation->lng = $request->lng;
            $geolocation->lat = $request->lat;
            $geolocation->save();
        }
    }
}
