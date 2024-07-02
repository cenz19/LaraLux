<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getProductByHotelId(Request $request)
    {
        $hotel_id = $request->hotel_id;

        // Retrieve all products where hotel_id matches the given value using query builder
        $products_by_hotel_id = DB::table('products')
            ->join('product_types', 'products.product_type_id', '=', 'product_types.id')
            ->join('hotels', 'products.hotel_id', '=', 'hotels.id')
            ->where('products.hotel_id', $hotel_id)
            ->select('products.*', 'product_types.product_type_name', 'hotels.hotel_name')
            ->get();

        return view('transaction.index', compact('products_by_hotel_id'));
    }
}
