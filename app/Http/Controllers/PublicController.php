<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Sliders;
use Illuminate\Http\Request;
use View;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($carid = NULL)
    {
        if (isset($carid)) {
            $car=Car::where('id','=',$carid)->with('Images','Brand')->get();
         
            return view('public_view.Car_Select',['yy'=>$car]);
        } else {
            $sliders = Sliders::all();
            $cars = Car::with('Images', 'Brand')->get();
           
            return view('public_view.index', ['cars' => $cars, 'sliders' => $sliders]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function OneCarPage($model)
    {
        $car = Car::where('model', '=', $model)->get();
        if (!$car) {
            return redirect()->route('index');
        } else {
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
