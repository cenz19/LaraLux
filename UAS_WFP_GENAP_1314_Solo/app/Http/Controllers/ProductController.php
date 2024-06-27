<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        //
        $product_index_controller = Product::all();
        $product_type_controller = ProductType::all();
        $product_hotel_id_controller = Hotel::all();
        return view('product.index', compact('product_index_controller', 'product_type_controller', 'product_hotel_id_controller'));
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
        $data = new Product();
        $product_name = $request->form_product_name;
        $product_type_id = $request->form_product_type_id;
        $price = $request->form_price;
        $hotel_id = $request->form_hotel_id;

        $data->product_name = $product_name;
        $data->product_type_id = $product_type_id;
        $data->price = $price;
        $data->hotel_id = $hotel_id;
        $data->created_at = now();
        $data->updated_at = now();

        $data->save();
        return redirect()->route('product.index')->with('status','Hooray ! Data successfully added');

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

    public function product_type_controller_function(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product_type_controller = ProductType::all();
        return view('producttype.index', compact('product_type_controller'));
    }

    public function store_type(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = new ProductType();
        $type_name = $request->form_type_name;
        $data->product_type_name = $type_name;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return redirect()->route('producttype.index')->with('status','Hooray ! Data successfully added');
    }
}
