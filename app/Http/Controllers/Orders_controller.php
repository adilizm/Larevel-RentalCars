<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;
use View;

class Orders_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('car')->where('Confermed', '<>', '1')->get();
        $Numbre_day = [];
        $Price = [];
        for ($i = 0; $i < count($orders); $i++) {
            $Number_days[$i] = ((strtotime($orders[$i]->End_renting) - strtotime($orders[$i]->Start_renting)) / 86400) + 1;
            $Price[$i] = $Number_days[$i] * $orders[$i]->car->Price_one_day;
        }
        // dd($orders,$Number_days,$Price);
        if (count($orders) == 0) {
            return View('private_views.orders.orders_in_Queue', ['orders' => [], 'Number_days' => [], 'Price' => 0]);
        } else {
            return View('private_views.orders.orders_in_Queue', ['orders' => $orders, 'Number_days' => $Number_days, 'Price' => $Price]);
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


        $start_year = substr($request->Start_renting, 6);

        $start_Month = substr($request->Start_renting, 0, 2);

        $start_Day = substr($request->Start_renting, 3, 2);
        //dd('start rent =>  '.$start_year.'-'. $start_Month.'-'. $start_Day  );
        $End_year = substr($request->End_renting, 6);

        $End_Month = substr($request->End_renting, 0, 2);

        $End_Day = substr($request->End_renting, 3, 2);



        $order = new Order();
        $request->validate([
            'Costumer_First_name'   =>  'bail|required|string|min:3|max:40',
            'Costumer_Last_name'    =>  'bail|required|string|min:3|max:40',
            'Phone_number'          =>  'bail|required|string|min:9|max:20',
            'Costumer_email'        =>  'bail|required|string|min:9|max:50',
            'Start_renting'         =>  'bail|required|date',
            'End_renting'           =>  'bail|required|date',
            'start_hour'            =>  'bail|required|string|min:3|max:40',
            'Finish_hour'           =>  'bail|required|string|min:3|max:40',
            'client_Country'        =>  'bail|required|string|min:3|max:40',
            'car_id'                =>  'required',
        ]);

        $car = Car::FindOrFail($request->car_id);
        $Number_days = ((strtotime($request->End_renting) - strtotime($request->Start_renting)) / 86400) + 1;
        $order->Costumer_First_name   = $request->Costumer_First_name;
        $order->Costumer_Last_name    = $request->Costumer_Last_name;
        $order->Phone_number          = $request->Phone_number;
        $order->Costumer_email        = $request->Costumer_email;
        $order->Start_renting         = $start_year . '-' . $start_Month . '-' . $start_Day;
        $order->End_renting           = $End_year . '-' . $End_Month . '-' . $End_Day;
        $order->start_hour            = $request->start_hour;
        $order->Finish_hour           = $request->Finish_hour;
        $order->client_Country        = $request->client_Country;
        $order->car_id                = $request->car_id;
        $order->Price                 = $car->Price_one_day * $Number_days;
        $order->Confermed             = false;
        $order->Canceled              = false;
        $order->is_deleted            = false;
        $order->Is_paid               = false;
        $order->Note                  = 'new order';


        $order->save();
        $request->session()->flash('Make_Order', 'Your Order is Accepted TankYou we will call you stay in touch');
        return redirect()->route('index');
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
        $order = Order::FindOrFail($id);
        $cars = Car::all();
        return View('private_views.orders.orders_edite', ['order' => $order, 'cars' => $cars]);
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
        $order = Order::Find($id);
        $request->validate([
            'Costumer_First_name'   =>  'bail|required|string|min:3|max:40',
            'Costumer_Last_name'    =>  'bail|required|string|min:3|max:40',
            'Phone_number'          =>  'bail|required|string|min:9|max:20',
            'Costumer_email'        =>  'bail|required|string|min:9|max:50',
            'Start_renting'         =>  'bail|required|date',
            'End_renting'           =>  'bail|required|date',
            'start_hour'            =>  'bail|required|string|min:3|max:40',
            'Finish_hour'           =>  'bail|required|string|min:3|max:40',
            'client_Country'        =>  'bail|required|string|min:3|max:40',
        ]);

        $car = Car::where('model', $request->model)->first();

        $orders = json_decode($car->orders_as_json, true);


        if ($orders == null) {
            $orders = []; // if teh car has no orders convert $orders to array so we can add json_order 
        }

        if ($request->Confermed == null) {
            $request->Confermed = false;
        } else {
            $request->Confermed = true;

            array_push($orders, ["from" => $request->Start_renting, "to" => $request->End_renting]);
            $orders = json_encode($orders);
        }
        if ($request->Canceled == null) {
            $request->Canceled = false;
        } else {
            $request->Canceled = true;
        }
        if ($request->Is_paid == null) {
            $request->Is_paid = false;
        } else {
            $request->Is_paid = true;
        }


        $Number_days = ((strtotime($request->End_renting) - strtotime($request->Start_renting)) / 86400) + 1;
        $order->Costumer_First_name   = $request->Costumer_First_name;
        $order->Costumer_Last_name    = $request->Costumer_Last_name;
        $order->Phone_number          = $request->Phone_number;
        $order->Costumer_email        = $request->Costumer_email;
        $order->Start_renting         = $request->Start_renting;
        $order->End_renting           = $request->End_renting;
        $order->start_hour            = $request->start_hour;
        $order->Finish_hour           = $request->Finish_hour;
        $order->client_Country        = $request->client_Country;
        $order->car_id                = $car->id;
        $order->Price                 = $car->Price_one_day * $Number_days;
        $order->Confermed             = $request->Confermed;
        $order->Canceled              = $request->Canceled;
        $order->is_deleted            = 0;
        $order->Runing_order          = 0;
        $order->Is_paid               = $request->Is_paid;
        $order->Note                  = $request->Note;
        $order->save();
        $car->orders_as_json = $orders;
        $car->save();
        $request->session()->flash('updated', 'One Order Updated');
        return redirect()->route('Order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req, $id)
    {
        $order = Order::findOrFail($id);
        $order->Note = $req->note;
        $order->save();
        $order->delete();
        return 'Deleted';
    }

    public function confirmed_list()
    {

        $orders = Order::where([['Confermed', '=', '1'], ['Runing_order', '<>', '1']])->get();
        $Numbre_day = [];
        $Price = [];
        for ($i = 0; $i < count($orders); $i++) {
            $Number_days[$i] = ((strtotime($orders[$i]->End_renting) - strtotime($orders[$i]->Start_renting)) / 86400) + 1;
            $Price[$i] = $Number_days[$i] * $orders[$i]->car->Price_one_day;
        }
        // dd($orders,$Number_days,$Price);
        if (count($orders) == 0) {
            return View('private_views.orders.orders_confermed', ['orders' => [], 'Number_days' => [], 'Price' => 0]);
        } else {
            return View('private_views.orders.orders_confermed', ['orders' => $orders, 'Number_days' => $Number_days, 'Price' => $Price]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($id)
    {
        $order = Order::FindOrFail($id);
        $cars = Car::all();
        return View('private_views.orders.orders_edit_confermed', ['order' => $order, 'cars' => $cars]);
    }


    public function update2(Request $request, $id)
    {

        $order = Order::Find($id);

        $car = Car::where('model', $request->model)->first();

        $orders = json_decode($car->orders_as_json, true);

        if (!$request->Canceled == null) {

            $request->Canceled = true;

            for ($i = 0; $i < count($orders); $i++) {
                if ($orders[$i]->from == $request->Start_renting) {
                    unset($orders[$i]);
                }
            }

            $order->Canceled = $request->Canceled;
            $car->orders_as_json = json_encode($orders);
            $car->save();
            $order->Canceled = $request->Canceled;
            $order->Note     = $request->Note;
            $order->save();
            $order->delete();
            $request->session()->flash('Order_Canceld', 'Order is deleted');
            return redirect()->route('confirmedorders');
        }
        if (!$request->Car_out == null) {

            if ($car->Current_Order != 0) {

                $request->session()->flash('Note', 'Car is not in yet !! check Running Orders ');
                return redirect()->route('confirmedorders');
            }

            $car->Car_out = 1;
            $car->Current_Order = $order->id;
            $Number_days = ((strtotime($request->End_renting) - strtotime($request->Start_renting)) / 86400) + 1;
            $order->Costumer_First_name   = $request->Costumer_First_name;
            $order->Costumer_Last_name    = $request->Costumer_Last_name;
            $order->Phone_number          = $request->Phone_number;
            $order->Costumer_email        = $request->Costumer_email;
            $order->Start_renting         = $request->Start_renting;
            $order->End_renting           = $request->End_renting;
            $order->start_hour            = $request->start_hour;
            $order->Finish_hour           = $request->Finish_hour;
            $order->client_Country        = $request->client_Country;
            $order->car_id                = $car->id;
            $order->Price                 = $car->Price_one_day * $Number_days;
            $order->Runing_order         = 1;
            $order->Note                  = $request->Note;

            $order->save();

            $car->orders_as_json = json_encode($orders);

            $car->save();
            $request->session()->flash('Car_out', 'Car is Out Good order');
            return redirect()->route('confirmedorders');
        }

        $order->Note                  = $request->Note;
        $order->save();
        $request->session()->flash('Note', 'New Note Added');
        return redirect()->route('confirmedorders');
    }


    public function RunningOrders()
    {
        $Runningorders = Order::whereHas('car', function ($query) {
            $query->where('Car_out', '=', '1');
        })
            ->where('Runing_order', '=', '1')->get();
        $Days_left = [];
        for ($i = 0; $i < count($Runningorders); $i++) {
            $Days_left[$i] = (strtotime($Runningorders[$i]->End_renting) - strtotime(date("Y/m/d"))) / (60 * 60 * 24);
        }
        return View('private_views.orders.orders_out', ['orders' => $Runningorders, 'days_left' => $Days_left]);
    }

    public function end_rent(Request $req, $id)
    {

        $order = Order::FindOrFail($id);
        $car = Car::where('Current_Order', '=', $order->id)->first();

        $car->Car_out = 0;
        $car->Current_Order = 0;
        $orders = json_decode($car->orders_as_json, true);
        //  dd($car,$order,$orders);
        $i = 0;
        foreach ($orders as $ord) {
            $i++;
            if ($ord['from'] == $order->Start_renting) {
                unset($orders[$i]);
               
            }
        }
      

     /*    for ($i = 0; $i < count($orders); $i++) {
            if ($orders[$i]->from == $order->Start_renting) {
                unset($orders[$i]);
            }
        }
 */
        $car->orders_as_json = json_encode($orders);
        $order->delete();
        $car->save();
        $req->session()->flash('order', 'order Completed');
        return redirect()->route('RunningOrders');
    }
}
