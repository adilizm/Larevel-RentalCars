<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\View;
use Hash;
use Illuminate\Http\Request;

class Manage_Employs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      //   Auth('login');
    }
    public function index()
    {
        $users = User::all();
            return View('private_views.users.employers_index', [
                'users' => $users,
            ]);
       
       // dd('You are not an admin');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('private_views.users.employers_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $New_user=new User();
        $New_user->name= $request->name;
        $New_user->email= $request->email;
        $New_user->password= Hash::make($request->password);
        $New_user->Fonction= $request->Fonction;
        $New_user->save();
        $request->session()->flash('added','New user added successfuly');
        return redirect()->route('employer.index');
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
    public function destroy(Request $request, $id)
    {
        try{
            $deleted_user=User::FindOrFail($id);
            $deleted_user->delete();
            $request->session()->flash('deleted','User was deleted');
            return redirect()->route('employer.index');
        }catch(\Exception $e){
            $request->session()->flash('Notdeleted','Faild to Delete the user');
            return redirect()->route('employer.index');

        }
    }
}
