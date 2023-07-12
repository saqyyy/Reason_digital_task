<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    // Applyed middleware in the contructer.
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Client $client)
    {
        $q = !empty($request->q) ? $request->q : '';
        $lat = !empty($request->lat) ? $request->lat : '';
        $lon = !empty($request->lon) ? $request->lon : '';
        if (!empty($lat) && !empty($lon)) {
            $res = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?APPID=626d5ec464e6a4d92da731bdd96ab250&q=' . $q . '&lat=' . $lat . '&lon=' . $lon);
        } elseif (!empty($request->q)) {
            $res = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?APPID=626d5ec464e6a4d92da731bdd96ab250&q=' . $q);
        } else {
            return response()->json(['error' => "Please provide lon and lat or qury", 'status' => 'ok']);
        }
        $response = $res->getBody()->getContents();
        return $response;
    }
}
