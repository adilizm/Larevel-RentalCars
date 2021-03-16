<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidateCar;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Image;
use Facade\FlareClient\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use Mockery\Undefined;
use PhpParser\Node\Expr\New_;

class Car_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('Images')->get();
        return view('private_views.cars.show_car', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('private_views.cars.create_car', ['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Car::create([
            'model'             => $request->model,
            'type_fule'         => $request->type_fule,
            'type_car'          => $request->type_car,
            'brand_id'          => $request->brand_id,
            'plaka'             => $request->plaka,
            'speedTo100km'      => $request->speedTo100km,
            'Number_perso'      => $request->Number_perso,
            'Number_balisat'    => $request->Number_balisat,
            'gear_type'         => $request->gear_type,
            'Price_one_day'     => $request->Price_one_day,
            'Door_number'       => $request->Door_number,
            'Seat_number'       => $request->Seat_number,
            'motor_model'       => $request->motor_model,
            'car_price'         => $request->car_price,
            'hors_power'        => $request->hors_power,
            'car_description'   => $request->car_description,
            'Distance_fee'      => $request->Distance_fee,
        ]);

        $car_id = DB::table('cars')->max('id');
        $data = [];

        foreach ($request->images as $image) {
            $name = time() . '-' . $request->model . '-' . count($data) . '.' . $image->guessExtension();
            $image->move(public_path('images'), $name);
            array_push($data, $name);
        }

        foreach ($data as $link) {
            Image::create([
                'car_id'        =>  $car_id,
                'image_link'    =>  $link
            ]);
        }

        /*we can also save using tis methode:
            $newCar= new Car();          
            $newCar->model=$request->model;
            $newCar->type_fule=$request->type_fule;
            $newCar->type_car =$request->type_car;
            $newCar->brand_id =$request->brand_id;
            $newCar->plaka=$request->plaka;
            $newCar->speedTo100km=$request->speedTo100km;
            $newCar->Number_perso =$request->Number_perso;
            $newCar->Number_balisat=$request->Number_balisat;
            $newCar->gear_type=$request->gear_type;
            $newCar->Price_one_day=$request->Price_one_day;
            $newCar->Door_number=$request->Door_number;
            $newCar->Seat_number=$request->Seat_number;
            $newCar->motor_model=$request->hors_power;
            $newCar->car_price=$request->car_price;
            $newCar->hors_power=$request->hors_power;
            $newCar->car_description=$request->car_description;
            $newCar->Distance_fee=$request->Distance_fee;
            $newCar->save();
         */


        return redirect()->route('car.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::with('Images')->FindOrFail($id);
        return view('public_view.Car_Select', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $car = Car::with('brand', 'images')->findOrFail($id);

        return view('private_views.cars.edit_car', ['car' => $car, 'brands' => $brands]);
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

        $car = Car::with('images')->FindOrFail($id);
        foreach ($car->images as $image) {
            if (!in_array($image->image_link, $request->all())) {
                $path = 'images/' . $image->image_link;
                if ($path != 'images/deleted') {
                    unlink($path);
                    Image::where('image_link', $image->image_link)->delete(); // insert empty on database for selected images
                }
            }
        }


        $data = [];

        if (isset($request->images)) {
            foreach ($request->images as $image) {
                $name = time() . '-' . $request->model . '-' . count($data) . '.' . $image->guessExtension();
                $image->move(public_path('images'), $name);
                array_push($data, $name);
            }

            foreach ($data as $link) {
                Image::create([
                    'car_id'        =>  $id,
                    'image_link'    =>  $link
                ]);
            }
        }





        $car->model             = $request->model;
        $car->type_fule         = $request->type_fule;
        $car->type_car          = $request->type_car;
        $car->brand_id          = $request->brand_id;
        $car->plaka             = $request->plaka;
        $car->speedTo100km      = $request->speedTo100km;
        $car->Number_perso      = $request->Number_perso;
        $car->Number_balisat    = $request->Number_balisat;
        $car->gear_type         = $request->gear_type;
        $car->Price_one_day     = $request->Price_one_day;
        $car->Door_number       = $request->Door_number;
        $car->Seat_number       = $request->Seat_number;
        $car->motor_model       = $request->motor_model;
        $car->car_price         = $request->car_price;
        $car->hors_power        = $request->hors_power;
        $car->car_description   = $request->car_description;
        $car->Distance_fee      = $request->Distance_fee;
        $car->save();

        return redirect()->route('car.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $carTodelet = Car::FindOrFail($id);
        $carTodelet->delete();
        return redirect()->route('car.index');
    }
  
}
