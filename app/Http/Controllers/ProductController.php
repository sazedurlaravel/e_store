<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::orderBy('id','desc')->get();
       
        return view('frontend.pages.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_product(){
        $data['categories'] = Category::all();
        $data['products'] = Product::all();
        $data['brands'] = Brand::all();
        $data['products']=Product::all();
        return view('backend.products.view-product',$data);
    }
    public function create()
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::all();
        $data['brands'] = Brand::all();
        return view('backend.products.add-product',$data);
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
            'title'=>'required',
            'description'=>'required',
            'color'=>'required',
            'size'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'offer_price'=>'required',
            'is_featured'=>'required',
            'image.*'=>'required|mimes:png,jpeg,jpg,gif'
        ]);
        $product = Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'color'=>$request->color,
            'size'=>$request->size,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'offer_price'=>$request->offer_price,
            'is_featured'=>$request->is_featured,
            
        ]);
        
        if($request->hasfile('image'))
        {

           foreach($request->file('image') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move('uploads', $name);  
               $data[] = $name; 
           }
        }
	
        $form= new ProductImage();
        $form->product_id =$product->id;
        $form->image=json_encode($data);
        
       
       $form->save();

    //     $this->validate($request, [

    //         'image' => 'required',
    //         'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    // ]);
      
    //    $product = Product::create($request->all());
      
    //    foreach($request->image as $file) {
    //     $name=$file->getClientOriginalName();
    //     $file->move('backend/images/products',$name);
        
    //     // create a new Image and relate it to the property
    //     $product->images()->create([
    //         'image' => $name,
    //         'product_id'=>$product->id,
    //         ]);
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $data['detailsData'] = Product::find($id);
        $details = Product::find($id);
        $data['categories'] = Category::all();
         $data['relatedProducts'] = Product::where('category_id',$details->category_id)->get();
        return view('backend.products.product-details',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Product::find($id);
        $data['categories'] = Category::all();
        $data['products'] = Product::all();
        $data['brands'] = Brand::all();
        return view('backend.products.add-product',$data);
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
            'title'=>'required',
            'description'=>'required',
            'color'=>'required',
            'size'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'offer_price'=>'required',
            'is_featured'=>'required',
            'image.*'=>'required|mimes:png,jpeg,jpg,gif'
        ]);
        $product= Product::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'color'=>$request->color,
            'size'=>$request->size,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'offer_price'=>$request->offer_price,
            'is_featured'=>$request->is_featured,
            
        ]);
        
        if($request->hasfile('image'))
        {

           foreach($request->file('image') as $image)
           {
               $name=$image->getClientOriginalName();
               $image->move('uploads', $name);  
               $data[] = $name; 
           }
        }
	
        $form=ProductImage::create([
            'product_id'=>$id,
            'image'=>json_encode($data)
        ]);
        foreach ($product->tags as $key => $value) {
            $tag_id = $value->id;
        }
        Product::find($product->id)->tags()->attach($tag_id);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return back();
    }
}
