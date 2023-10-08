<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\City;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', "PlaceController@start");

$router->get('/cities', "CityController@getCities");
$router->get('/cities/filter', "CityController@getCitiesParams");


$router->get('/test', function(){
    return City::all();
});
$router->post('/test1', function(Request $request){
    return $request->all();
});
