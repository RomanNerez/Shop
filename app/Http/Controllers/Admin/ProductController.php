<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Products;

class ProductController extends Controller
{
    public function index ()
    {
    	return view('admin.product.product');
    }

    public function displayAddProduct ()
    {
    	return view('admin.product.productAE');
    }

    public function getProduct ( Request $request )
    {
    	$page = $request->input('page');
    	$page -= 1;

    	$products = new Products();
        $items = $products->orderBy('id', 'desc')->offset($page*15)->limit(15)->get();
        
        foreach ($items as &$value) {
            $value->sub_category->first();
        }

    	return response()->json([
		    'products' => $items,
		    'count' => ceil($products->count()/15)
		]);
    }

    public function addProduct (Request $request)
    {
        $data = $request->all()['product'];
        
        foreach ($data['photos'] as $key => $photo) {
            $data['photos'][$key] = Str::afterLast($photo, 'storage/');
        }
        $data['photos'] = json_encode($data['photos']);

        $data['slug'] = Str::slug($data['title'], '-');

        $messages = [
            'required' => 'Поле :attribute должно быть заполненое!',
            'unique' => 'Такое название уже существует'
        ];

        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'manufacturer' => 'required',
            'material' => 'required',
            'sub_categories_id' => 'required',
            'slug' => 'required|unique:products|max:255',
        ], $messages)->validate();
        
        $product = Products::create($data);
        $product->save();

        return $product;
    }

    public function editProduct (Request $request)
    {
        $data = $request->all()['product'];
        unset($data['sub_category']);
        foreach ($data['photos'] as $key => $photo) {
            $data['photos'][$key] = Str::afterLast($photo, 'storage/');
        }
        $data['photos'] = json_encode($data['photos']);

        $data['slug'] = Str::slug($data['title'], '-');

        $messages = [
            'required' => 'Поле :attribute должно быть заполненое!',
            'unique' => 'Такое название уже существует'
        ];

        $rulers = [
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'manufacturer' => 'required',
            'material' => 'required',
            'sub_categories_id' => 'required',
            'slug' => 'required|unique:products|max:255',
        ];

        $existsProduct = Products::where([
            [ 'id', '!=', $data['id'] ],
            [ 'slug', $data['slug'] ]
        ])->exists();

        if (!$existsProduct) {
            unset($rulers['slug']);
        }

        $validator = Validator::make($data, $rulers, $messages)->validate();
        
        $data['created_at'] = date('Y-m-d H:m:s', strtotime($data['created_at']));
        $data['updated_at'] = date('Y-m-d H:m:s', time());

        $product = Products::where('id', $data['id'])->update($data);

        $data['created_at'] = date('d.m.Y', strtotime($data['created_at']));
        $data['updated_at'] = date('d.m.Y', time());

        return $data;
    }

    public function activeProduct ( Request $request )
    {
        $id = $request->input('id');
        $category = Products::where('id', $id)->update(['active' => $request->input('active')]);
    }

    public function deleteProduct ( Request $request ) 
    {
        $id = $request->input('id');
        $category = Products::where('id', $id)->delete();
    }
}
