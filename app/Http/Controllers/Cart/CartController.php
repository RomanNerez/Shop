<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Cart\CollectionsCartRepository;
use App\Repositories\Cart\AddCartRepository;
use App\Repositories\Cart\DeleteCartRepository;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('shop.cart');
    }

    public function addCart(Request $request)
    {
        $data = $request->input('input');
        $addCart = new AddCartRepository($data['id'], $data['count']);
        return response()->json([
            'status' => 200,
            'done' => 1,
            'item' => $addCart->addCart()
        ]);
    }

    public function allCarts(){
        return response()->json([
            'status' => 200,
            'done' => 1,
            'items' => CollectionsCartRepository::getProducts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function delete(Request $request)
    {
        $cart = new DeleteCartRepository($request->input('id'));
        $cart->deleteCart();
        return response()->json([
            'status' => 200,
            'done' => 1
        ]);
    }
}
