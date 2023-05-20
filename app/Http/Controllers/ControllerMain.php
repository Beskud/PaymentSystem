<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerMain extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        $user = Auth::user();
        $user_products = array_flip(array_column(UserProduct::where('user_id', $user->id)->get()->toArray(),'product_id'));
        return view('main')->with('products', $products)->with('user', $user)->with('user_products',$user_products);
    }

    public function logout() {
        Auth::logout();
        return redirect('/authorization');
    }

    public function download(Request $request) { 
        
        $checkAccess = UserProduct::where([
                'user_id' =>  Auth::user()->id,
                'product_id' => $request->product_id
            ])->first();
           
        if (!empty($checkAccess)) {
            $content = Product::where('id',$request->product_id)->first();
            return view('download')->with('data', $content->title);
        }
        return view('download')->with('data', 'u dont buy it');
    }
}
