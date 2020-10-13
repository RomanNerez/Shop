<?php

namespace App\Http\Controllers;

use App\Categories;
use App\SubCategories;
use App\Products;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	$categories = Categories::where('active', 1)->get();
    	return view('shop.app', compact('categories'));
    }

    public function productList($category){
        $subcategories = Categories::where([
            ['slug', $category],
            ['active', 1]
        ])->first()->sub_categories;
        return view('shop.productlist', compact('subcategories'));
    }

    public function producting($slug){
        $product = Products::where('slug', $slug)->first();
    	return view('shop.product', compact('product'));
    }

    public function products($category, $subcategory){
        $products = SubCategories::where('slug', $subcategory)->first()->products;
        return view('shop.products', compact('products'));
    }

    public function about(){
        return view('shop.about');
    }

    public function blog(){
        return view('shop.blog');
    }

    public function contacts(){
        return view('shop.contacts');
    }

    public function cart(){
        return view('shop.cart');
    }

    public function waranty(){
        return view('shop.waranty');
    }
}