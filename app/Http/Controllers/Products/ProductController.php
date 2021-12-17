<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * show add product form
     **/
    public function index() {
        return view('product.add');
    }
    /**
     * store product
    **/
    public function storeProduct(ProductRequest $request) {
        $status = Product::createProductData($request->all());
        if($status['status']) {
            return redirect()->back()->with('success',$status['message']);
        }
        return redirect()->back()->with('error',$status['message']);
    }

    /**
     * get specific product details
     **/
    public function editProduct($id) {
        $product = Product::where('id','=',$id)->first();
        return view('product.update',[
            'product' => $product
        ]);
    }

    /**
     * update product against product id
     **/
    public function updateProduct(ProductRequest $request) {
        $status = Product::updateProductData($request->all());
        if($status['status']) {
            return redirect()->route('getProducts')->with('success',$status['message']);
        }
        return redirect()->back()->with('error',$status['message']);
    }

    /**
     * get all products
     **/
    public function getProducts() {
        $products = Product::all();
        return view('product.all',[
           'products' => $products
        ]);
    }

    /**
     * delete specific product
     **/
    public function deleteProduct($id) {
        Product::where('id','=',$id)->delete();
        return back()->with('success','product deleted successfully ... !');
    }
}
