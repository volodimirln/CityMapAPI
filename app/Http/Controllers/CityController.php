<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;



class CityController extends Controller
{
    public function getCities(){
        return City::select("*")->join('CityPhotos', 'Cities.id', '=', 'CityPhotos.city_id')->get();
        ;
    }
    public function getCitiesParams(Request $request){
        return City::select("*")->join('CityPhotos', 'Cities.id', '=', 'CityPhotos.city_id')->where("Cities.name","=",$request->city)->get();
        ;
    }
}
