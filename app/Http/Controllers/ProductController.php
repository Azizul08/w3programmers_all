<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
 
    {
        $products = Product::all();
        return view('pages.productlist', compact('products'));
    }
 
   
 
    public function cart()
 
    {
        return view('pages.cart');
    }
    public function addToCart($id)
 
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
 
        } else {
 
            $cart[$id] = [
 
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
 
   
    public function update(Request $request)
 
    {
 
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
  public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }




    public function index2()
    {
        $products = Product::all();
   
        return view('products.index2',compact('products'));
    }
   
  
    public function createStepOne(Request $request)
    {
        $product = $request->session()->get('product');
   
        return view('products.create-step-one',compact('product'));
    }
   
  
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products',
            'description' => 'required',
        ]);
   
        if(empty($request->session()->get('product'))){
            $product = new Product();
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }else{
            $product = $request->session()->get('product');
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }
   
        return redirect()->route('products.create.step.two');
    }
   
  
    public function createStepTwo(Request $request)
    {
        $product = $request->session()->get('product');
   
        return view('products.create-step-two',compact('product'));
    }
   
  
    public function postCreateStepTwo(Request $request)
    {
        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $path="images/";
        //     $file_name=date('YmdHis').".".$file->getClientOriginalExtension();
        //     $file->move($path,$file_name);
        //     $product->image = $file_name;
        // }   
        // dd($product->image);
        $validatedData = $request->validate([
            // 'image' => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048',
            'price' => 'required',
        
        ]);

        $product = $request->session()->get('product');
        // $product->fill($validatedData);
        $request->session()->put('product', $product);
   
        return redirect()->route('products.create.step.three');
    }
   
 
    public function createStepThree(Request $request)
    {
        $product = $request->session()->get('product');
   
        return view('products.create-step-three',compact('product'));
    }
  
    public function postCreateStepThree(Request $request)
    {
        // dd($request);
        $product = $request->session()->get('product');
        $product->save();
   
        $request->session()->forget('product');
   
        return redirect()->route('products.index2');
    }
}

