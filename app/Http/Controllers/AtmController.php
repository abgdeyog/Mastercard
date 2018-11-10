<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atm;

class AtmController extends Controller
{
    public function index()
    {
        return Atm::all();
    }
    public function nearestAtms(Request $request)
    {
        $lat = $request["lat"];
        $lgt = $request["lgt"];
        $radius = $request["radius"]??0;
        $atms = Atm::all();
        $result = [];
        foreach ($atms as $atm)
        {
            if($this->distance($lat, $lgt, $atm->getAttribute("lat"),
                    $atm->getAttribute("lgt"), "K") <= $radius)
            {
                array_push($result, $atm);
            }
        }
        return $result;
    }
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
}
