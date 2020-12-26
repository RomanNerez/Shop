<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categories;
use App\SubCategories;
use App\Products;
use App\Models\Menu;
use App\Models\MenuAreaVisibilities;
use App\Models\ArbitraryLinks;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Categories::orderBy('id', 'desc')->limit(10)->get();
        
        $sub_categories = SubCategories::orderBy('id', 'desc')->limit(10)->get();

        $products = Products::orderBy('id', 'desc')->limit(15)->get();

        $data = [
            'sub_categories' => $sub_categories,
            'params' => [
                'section' => $request->get('section') ? $request->get('section') : 'categories',
                'page' => $request->get('page') ? $request->get('page') : 1,   
            ],
            'langs' => DB::table('langs')->get(),
            'store'  => [
                'arbitrary_links' => ArbitraryLinks::orderBy('created_at', 'desc')->get()
            ],
            'settings' => [
                'menu' => [
                    'area_visibility' => MenuAreaVisibilities::orderBy('created_at', 'desc')->get(),
                    'menu' => Menu::orderBy('order', 'desc')->get()
                ]
            ],
        ];

        return view('admin.dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
