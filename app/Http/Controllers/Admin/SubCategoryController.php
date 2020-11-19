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
    
    public function activeSubCategory (Request $request)
    {
        $id = $request->input('id');
        $category = SubCategories::where('id', $id)
            ->update(['active' => $request->input('active')]);
    }

    public function getSubCategories (Request $request) {
        $page = $request->input('page');
        $page -= 1;

        $subCategories = new SubCategories();
        $items = $subCategories->orderBy('id', 'desc')->offset($page*15)->limit(15)->get();
        foreach ($items as &$value) {
            $value->category;
        }
        return response()->json([
            'subCategories' => $items,
            'count' => ceil($subCategories->count()/15)
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
    	$data = $request->all()['sub_category'];
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

        $category = SubCategories::create($data);
        $category->save();
        $category->category;
        $category->active = (int)$category->active;

        return response()->json($category);
    }

    public function editSubCategory (Request $request)
    {	
    	$data = $request->all()['sub_category'];
        unset($data['category']);
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

        $slug = SubCategories::where([ 
            ['id', $data['id']],
            ['title', $data['title']]
        ])->exists();

        if ($slug) {
            unset($rulers['slug']);
        }

        $data['created_at'] = date('Y-m-d H:m:s', strtotime($data['created_at']));
        $data['updated_at'] = date('Y-m-d H:m:s', time());

        $validator = Validator::make($data, $rulers, $messages)->validate();;

        $category = SubCategories::where('id', $data['id'])->update($data);

        $data['created_at'] = date('d.m.Y', strtotime($data['created_at']));
        $data['updated_at'] = date('d.m.Y', time());

        return $data;
    }

    public function deleteSubCategory (Request $request)
    {
        $id = $request->input('id');
        $category = SubCategories::where('id', $id)->delete();
    }
}
