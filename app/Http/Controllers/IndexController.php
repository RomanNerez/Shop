<?php

namespace App\Http\Controllers;

use App\Categories;
use App\SubCategories;
use App\Products;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	$categories = Categories::active()->get();

        $popularProducts = Products::active()->where('popular', 1)->limit(8)->get();
        
    	return view('shop.app', compact('categories', 'popularProducts'));
    }

    public function productList($category){
        $category = Categories::active()->where('slug', $category)->first();
        $subcategories = $category->sub_categories;
        return view('shop.productlist', compact('subcategories', 'category'));
    }

    public function producting($slug){
        $product = Products::active()->where('slug', $slug)->first();
    	return view('shop.product', compact('product'));
    }

    public function products($category, $subcategory){
        $category = Categories::active()->where('slug', $category)->first();
        $sub_category = SubCategories::active()->where('slug', $subcategory)->first();
        $products = $sub_category->products;
        return view('shop.products', compact('products', 'category', 'sub_category'));
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