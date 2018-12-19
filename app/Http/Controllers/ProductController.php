<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use QRCode;

class ProductController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        return view('product.list', ['products' => Product::paginate(10)]);
    }
    
    // Purchase
    public function purchase()
    {
        $input = Input::get("username", "");
        $modelProduct = new Product();
        $data = $modelProduct->purchase($input);
        $res = QRCode::text($data->code)->setSize(10)->setErrorCorrectionLevel('H')->png();

        return response($res, 200)->header('Content-Type', 'image/png');
    }
    
    public function activate()
    {
        $username = Input::get("username", "");
        $code = Input::get("code", "");
        $modelProduct = new Product();
        
        $result = $modelProduct->activate($username, $code);
        return response()->json([
            'result' => $result == 1,
            'message' => $result == 1 ? 'Product is activated.' : 'Product has been used by another person.',
        ]);
    }
}