<?php

namespace App\Http\Controllers;
use DB;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products'] = DB::table('products')->where('status',1)->get();
        return view('home', $data);
    }

    public function addtocart(Request $request, $productId)
    {
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
        }else{
            $cart = [];
        }
        array_push($cart,$productId);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function showcart(Request $request){
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            if(!empty($cart)){
                $data['products'] = DB::table('products')->whereIn('id', $cart)->get();
            }else{
                $data['products'] = [];
            }
            
        }else{
            $data['products'] = [];
        }
        return view('cart', $data);
        
    }
    
}
