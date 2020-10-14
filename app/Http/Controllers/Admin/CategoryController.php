<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    const DEFAULT_PAGINATION = 15;

    public function index ()
    {
    	$data = [
    		'categories' => Categories::orderBy('id', 'desc')->get()
    	];
    	return view('admin.category.categories', compact('data'));
    }

    public function getCategories (Request $request) {
        $page = $request->input('page');
        $page -= 1;

        $products = new Categories();

        return response()->json([
            'categories' => $products
                ->orderBy('id', 'desc')
                ->offset($page*self::DEFAULT_PAGINATION)
                ->limit(self::DEFAULT_PAGINATION)
                ->get(),
            'count' => ceil($products->count()/self::DEFAULT_PAGINATION)
        ]);
    }

    public function addCategory (Request $request)
    {
    	$data = $request->all()['category'];
        $data['file'] = Str::afterLast($data['file'], 'storage/');
    	$data['slug'] = Str::slug($data['title'], '-');

    	$messages = [
    		'required' => 'Поле :attribute должно быть заполненое!',
    		'unique' => 'Такое название уже существует'
    	];

    	$validator = Validator::make($data, [
            'title' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'desc' => 'required',
            'meta_desc' => 'required',
            'slug' => 'required|unique:categories|max:255',
        ], $messages)->validate();

        $category =Categories::create($data);
        $category->save();

        return $category;
    }

    public function editCategory (Request $request)
    {   
        $data = $request->all()['category'];

        $data['file'] = Str::afterLast($data['file'], 'storage/');
        $data['slug'] = Str::slug($data['title'], '-');

        $messages = [
            'required' => 'Поле :attribute должно быть заполненое!',
            'unique' => 'Такое название уже существует'
        ];

        $rulers = [
            'title' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'desc' => 'required',
            'meta_desc' => 'required',
            'slug' => 'required|unique:categories|max:255',
        ];

        $slug = Categories::where([ 
            ['id', $data['id']],
            ['title', $data['title']]
        ])->exists();

        if ($slug) {
            unset($rulers['slug']);
        }

        $data['created_at'] = date('Y-m-d H:m:s', strtotime($data['created_at']));
        $data['updated_at'] = date('Y-m-d H:m:s', time());

        $validator = Validator::make($data, $rulers, $messages)->validate();;

        $category = Categories::where('id', $data['id'])->update($data);

        $data['created_at'] = date('d.m.Y', strtotime($data['created_at']));
        $data['updated_at'] = date('d.m.Y', time());

        return $data;
    }

    public function deleteCategory (Request $request)
    {
        $id = $request->input('id');
        $category = Categories::where('id', $id)->delete();
    }

    public function activeCategory ( Request $request )
    {
        $id = $request->input('id');
        $category = Categories::where('id', $id)->update(['active' => $request->input('active')]);
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
