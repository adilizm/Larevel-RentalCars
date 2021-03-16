<?php

namespace App\Http\Controllers;

use App\Models\Sliders;
use Illuminate\Http\Request;

class Sliders_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Sliders::all();
        return view('private_views.Sliders.sliders_index', ['Sliders' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('private_views.Sliders.sliders_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'Slide_link'  => 'bail|mimes:png,jpg|required',
            'Titel'       => 'bail|required|min:3|max:25',
            'Discription' => 'bail|required|min:10|max:100',
        ]);

        $name = time() . '-' . $request->Titel . '.' . $request->Slide_link->guessExtension();
        $request->Slide_link->move(public_path('sliders'), $name);
        Sliders::create([
            'Titel'         => $request->Titel,
            'Discription'   => $request->Discription,
            'Slide_link'    => $name,
        ]);


        $request->session()->flash('added', 'Slider Created successfuly');
        return redirect()->route('slider.index');
    }catch(\Exception $e){
        return 'chi7aja mahiyach';
    }
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
        $slider = Sliders::FindOrFail($id);
        return view('private_views.Sliders.sliders_edit', ['slider' => $slider]);
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

        try {
            $slider = Sliders::FindOrFail($id);
            if ($request->Slide_link != null) {
                $name = time() . '-slider.' . $request->Slide_link->guessExtension();
                unlink('sliders/' . $slider->Slide_link);
                $slider->Slide_link = $name;
                $request->Slide_link->move(public_path('sliders'), $name);
            }

            $slider->Titel = $request->Titel;
            $slider->Discription = $request->Discription;
            $slider->save();
            $request->session()->flash('added', 'Slider deleted successfuly');
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            $request->session()->flash('Notadded', 'Slider Not Updated');
            return redirect()->route('slider.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $slider = Sliders::FindOrFail($id);
            unlink(public_path('sliders/' . $slider->Slide_link));
            $slider->delete();
            $request->session()->flash('deleted', 'Slider deleted successfuly');
            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            $request->session()->flash('Notdeleted', '!! something went wrong !!');
            return redirect()->route('slider.index');
        }
    }
}
