<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use Illuminate\Http\Request;



class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = DB::table('brands')->get();
        return view('private_views.brands.show_brand', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('private_views.brands.create_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checks = Brand::all();
        foreach ($checks as $check) {
            if ($request->brand_name == $check->brand_name) {
                $request->session()->flash('warning', 'Brand alredy exist');
                return redirect()->route('brand.index');
            }
        }

        $request->validate([
            'brand_name' => 'bail|required|string|min:2|max:20',
        ]);
        Brand::create([
            'brand_name' => $request->brand_name
        ]);
        $request->session()->flash('succes', 'Brand Added');
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $brand)
    {
        try {

            $brandToDelet = Brand::FindOrFail($brand);
            $brandToDelet->delete();
            $request->session()->flash('Deleted', "Brand deleted successfully");
            return redirect()->route('brand.index');
            
        } catch (\Exception $e) {

            $request->session()->flash('NotDeleted', "Please Delet all cars from this Brand and try again");
            return redirect()->route('brand.index');
        }
    }
}
