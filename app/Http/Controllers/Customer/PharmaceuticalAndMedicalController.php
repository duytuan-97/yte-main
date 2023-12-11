<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PharmaceuticalAndMedicalController extends Controller
{
    public function index(){

        // $products = Product::where('display', true)->orderBy('created_at','desc')->limit(9)->get();
        $products = Product::where('display', true)->orderBy('created_at','desc')->paginate(9);

        return view('customer.pharmaceutical_and_medical.index',[
            'products' => $products
        ]);
    }

    public function PharmaceuticalDetail(Request $request){
        // $product = Product::first();
        $product = Product::find($request->id);
        $product_images = $product->images;
        return view('customer.pharmaceutical_and_medical.pharmaceutical_detail',[
            'product' => $product,
            'product_images' => $product_images,
        ]);
    }

    public function medicineIndex(){
        // $products = Product::where('display', true)->orderBy('created_at','desc')->limit(9)->get();
        $products = Product::where('display', true)->orderBy('created_at','desc')->paginate(9);
        return view('customer.pharmaceutical_and_medical.medicine_index',[
            'products' => $products
        ]);
    }

    public function dangThucHien(){
        return view('customer.dangthuchien');
    }
}
