<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Product;

class Productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('backend.page.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  $request->validate([
        'name'=>'required',
        'description'=>'required',
        'category'=>'required',
        'price'=>'required',
        'start_date'=>'required',
        'end_date' => 'required',
        'status'=>'required',
       
    ]);


    // Handle the uploaded image
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName); // Store in public/images directory
    }
       

       $allArry=[
        'name'=>$request->name,
        'description'=>$request->description,
        'category'=>$request->category,
        'price'=>$request->price,
        'image' => 'images/' . $imageName, // Save the image path in the database
        'status'=>$request->status,
        'start_date' =>$request->start_date,
        'end_date' => $request->end_date,
       ];
    //    Product::create($allArry); // Use the model to create the record

       DB::table('products')->insert($allArry);
       return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show()

    {   
        $items=DB::table('products')->orderBy('id','desc')->get();
        return view('backend.page.online',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {    
        $value=DB::table('products')->where('id',$id)->first();
        return view('backend.page.product_edit',compact('value'));
        
    }
        

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)

    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
        $request->image = $image->move(public_path('images'), $imageName); // Store in public/images directory
        }
           
    
           $allArry=[
            'name'=>$request->name,
            'description'=>$request->description,
            'category'=>$request->category,
            'price'=>$request->price,
            'image' => 'images/' . $request->image, // Save the image path in the database
            'status'=>$request->status,
           ];
           DB::table('products')->where('id',$id)->update($allArry);
           return redirect('online/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('products')->where('id',$id)->delete();
        return redirect('online/product');
    }
}
