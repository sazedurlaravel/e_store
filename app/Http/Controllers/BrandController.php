<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.view-brand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.add-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpeg,jpg,gif'
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        if ($request->hasFile('image')) {
            $file_path = 'backend/images/brands';
            $file_name = uniqid().".".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($file_path,$file_name);
        }
        $brand->image = $file_name;
        $brand->save();

        return back();
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
        $editData = Brand::find($id);
        return view('backend.brands.add-brand',compact('editData'));
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
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpeg,jpg,gif'
        ]);
        if($request->hasFile('image'))
        {
                $image = $request->file('image');
               $name=$image->getClientOriginalName();
               $image->move('backend/images/brands', $name);  
        }
        $data = Brand::find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$name
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        return back();
    }
}
