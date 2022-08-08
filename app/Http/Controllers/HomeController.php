<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * Show the form for lists the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productList()
    {
        $productLists = Product::latest()->paginate(5);
    
        return view('products.lists',compact('productLists'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
        // return view('products.lists',compact('product'));
    }
    
}
