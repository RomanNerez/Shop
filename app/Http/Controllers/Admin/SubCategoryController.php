<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubCategories;
use App\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index ()
    {
    	$data = [
    		'categories' => Categories::orderBy('id', 'desc')->get(),
    		'sub_categories' => SubCategories::orderBy('id', 'desc')->paginate(10)
    	];

    	return view('admin.sub_category.subcategories', compact('data'));
    }

    public function displayAddCategory ()
    {
    	$data = [
    		'categories' => Categories::orderBy('id', 'desc')->get()
    	];
    	return view('admin..sub_category.sub_categoryAdd', compact('data'));
    }

    public function displayEditCategory ($id)
    {
    	$item = SubCategories::where('id', $id);
    	if($item->doesntExist()){
    		abort(404);
    	}
    	$data = [
    		'categories' => Categories::orderBy('id', 'desc')->get(),
    		'item' => $item->first()
    	];
    	return view('admin..sub_category.sub_categoryEdit', compact('data'));
    }

    public function getSubCategories (Request $request) {
        $page = $request->input('page');
        $page -= 1;

        $products = new SubCategories();

        return response()->json([
            'subCategories' => $products->orderBy('id', 'desc')->offset($page*15)->limit(15)->get(),
            'count' => ceil($products->count()/15)
        ]);
    }

    public function getAllSubCategories () 
    {
        $sub_categories = new SubCategories();
        return response()->json([
            'subCategories' => $sub_categories->orderBy('id', 'desc')->get(),
        ]);
    }

    public function addSubCategory (Request $request)
    {	
    	$request->merge([
	        'slug' => Str::slug($request->all()['title']),
	    ]);

    	$data = $request->all();

    	$active = isset($data['active']) ? '1' : '0';

    	$messages = [
    		'required' => 'Поле :attribute должно быть заполненое!',
    		'unique' => 'Такое название уже существует'
    	];

    	$validator = Validator::make($data, [
    		'categories_id' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:sub_categories|max:255',
        ], $messages);

        if ($validator->fails()) {
            return redirect('/admin/sub_categories/add')
                        ->withErrors($validator)
                        ->withInput();
        }

        SubCategories::create([
        	'categories_id' => $data['categories_id'],
        	'title' => $data['title'],
        	'slug'  => $data['slug'], 
        	'active' => $active
        ]);

    	return redirect('/admin/sub_categories')->with('status', 'Подкатегория создана');
    }

    public function editCategory (Request $request, $id)
    {	
    	$request->merge([
	        'slug' => Str::slug($request->all()['title']),
	    ]);

    	$data = $request->all();

    	$data['active'] = isset($data['active']) ? '1' : '0';

    	$messages = [
    		'required' => 'Поле :attribute должно быть заполненое!',
    		'unique' => 'Такое название уже существует'
    	];

    	$validator = Validator::make($data, [
    		'categories_id' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|unique:sub_categories|max:255',
        ], $messages);

        if ($validator->fails()) {
            return redirect("/admin/sub_categories/{$id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        SubCategories::where('id', $id)->update([
        	'categories_id' => $data['categories_id'],
        	'title' => $data['title'],
        	'slug'  => $data['slug'], 
        	'active' => $data['active']
        ]);

    	return redirect('/admin/sub_categories')->with('status', 'Подкатегория обновлена');
    }

    public function deleteCategory ($id)
    {
    	$sub_category = SubCategories::where('id', $id);

        foreach ($sub_category->first()->products as &$product) {
            $product->delete();
        }

        $sub_category->delete();
    	return redirect('/admin/sub_categories')->with('status', 'Подкатегория удалена');
    }
}
