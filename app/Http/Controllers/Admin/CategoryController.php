<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
    	$data = [
    		'categories' => Categories::orderBy('id', 'desc')->get()
    	];
    	return view('admin.category.categories', compact('data'));
    }

    public function displayAddCategory ()
    {
        return view('admin.category.categoryAdd');
    }

    public function displayEditCategory ($id)
    {
        $item = Categories::where('id', $id);
        if($item->doesntExist()){
            abort(404);
        }
        $data = [
            'item' => $item->first()
        ];
        return view('admin.category.categoryEdit', compact('data'));
    }

    public function addCategory (Request $request)
    {
    	$data = $request->all();
        dd($data);
    	$data['slug'] = Str::slug($data['title'], '-');
    	$active = isset($data['active']) ? '1' : '0';

    	$messages = [
    		'required' => 'The :attribute field is required.',
    		'unique' => 'Такое название уже существует'
    	];

    	$validator = Validator::make($data, [
            'title' => 'required|max:255',
            'slug' => 'required|unique:categories|max:255',
        ], $messages);

        if ($validator->fails()) {
            return redirect('/admin/categories')
                        ->withErrors($validator)
                        ->withInput();
        }

        Categories::create([
        	'title' => $data['title'],
        	'slug'  => $data['slug'], 
        	'active' => $active
        ]);

    	return redirect('/admin/categories')->with('status', 'Категория создана');
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
            'title' => 'required|max:255',
            'slug' => 'required|unique:categories|max:255',
        ], $messages);

        if ($validator->fails()) {
            return redirect("/admin/categories/{$id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        Categories::where('id', $id)->update([
            'title' => $data['title'],
            'slug'  => $data['slug'], 
            'active' => $data['active']
        ]);

        return redirect('/admin/categories')->with('status', 'Категория обновлена');
    }

    public function deleteCategory ($id)
    {
        $category = Categories::where('id', $id);
        
        foreach ($category->first()->sub_categories as &$sub_category) {
            $sub_category->delete();
        }
        foreach ($category->first()->products as &$product) {
            $product->delete();
        }

    	$category->delete();

    	return redirect('/admin/categories')->with('status', 'Категория удалена!');;
    }

    public function restoreCategory ($id)
    {
        $category = Categories::where('id', $id);
        
        foreach ($category->first()->sub_categories as &$sub_category) {
            $sub_category->restore();
        }
        foreach ($category->first()->products as &$product) {
            $product->restore();
        }

        $category->restore();

        return redirect('/admin/categories')->with('status', 'Категория удалена!');;
    }
}
