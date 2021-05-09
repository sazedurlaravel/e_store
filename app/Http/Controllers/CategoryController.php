<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = Category::all();
    return view('backend.categories.view-category',$data);
     
    }

    public function create(){
        return view('backend.categories.add-category');
    }
    
    // public function catData()
    // {
    //     $data['allData'] = Category::all();
    //    return view('backend.categories.view-category',$data);
     
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
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
        if($request->hasFile('image'))
        {
                $image = $request->file('image');
               $name=$image->getClientOriginalName();
               $image->move('backend/images/categories', $name);  
        }
        $data = Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$name
        ]);
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
        $editData = Category::find($id);
        return view('backend.categories.add-category',compact('editData'));
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
               $image->move('backend/images/categories', $name);  
        }
        $data = Category::find($id)->update([
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
       Category::find($id)->delete();
       return back();
    }
}
