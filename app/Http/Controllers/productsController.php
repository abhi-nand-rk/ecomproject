<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function showproductform()
    {
        return view('showproducts');
    }

    public function createproduct(Request $request)
    {
        
        $productname = $request->input('productname');
        $quantity = $request->input('quantity');
        $description = $request->input('description');
        $price = $request->input('price');

        $credentials = [
            'productname' => $productname,
            'quantity' => $quantity,
            'description' => $description,
            'price' => $price,
            'status' => 0
        ];

        if (DB::table('products')->insert($credentials)) {
            $data['message'] = 'Insert Succesfull';
        }

        return redirect('products');
    }

    public function listproducts()
    {
        $data['products'] = DB::table('products')->get(); //get all posts in posts table
        // additional constraints can be implemented using query builder

        return view('listproducts', $data);
    }

    public function viewproduct(Request $request,$ProductId)
    {

        $data['products'] = DB::table('products')->where('id',$ProductId)->first();

        return view('viewproducts',$data);
    }

    public function editproduct(Request $request,$ProductId)
    {

        $data['products'] = DB::table('products')->where('id',$ProductId)->first();

        return view('editproducts',$data);
    }
    public function updateproduct(Request $request,$ProductId)
    {

        $productname = $request->input('productname');
        $quantity = $request->input('quantity');
        $description = $request->input('description');
        $price = $request->input('price');

        $credentials = [
            'productname' => $productname,
            'quantity' => $quantity,
            'description' => $description,
            'price' => $price,
        ];


        if (DB::table('products')->where('id', $ProductId)->update($credentials)) {
            return redirect('products');
        } else {
            $data['message'] = 'Update Failed';
        }

    }

    public function deleteproduct($ProductId)
    {
        if (DB::table('products')->where('id', $ProductId)->delete()) {
            return redirect('products');
        } else {
            $data['message'] = 'Delete Failed';
        }

        
    }
    
    public function approveproduct(Request $request,$ProductId)
    {
        $credentials = [
            'status' => 1
        ];
        if (DB::table('products')->where('id', $ProductId)->update($credentials)) {
            return redirect('products');
        } else {
            $data['message'] = 'Update Failed';
        }

    }

    public function productdetails(Request $request,$ProductId){

        $data['products'] = DB::table('products')->where('id',$ProductId)->first();
        
                return view('productdetails',$data);
            }
                         

}
