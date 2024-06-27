<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\Product;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        //
        $facility_index_controller = Facility::all();
        $product_id = Product::all();
        return view('facility.index', compact('facility_index_controller', 'product_id'));
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
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //
        $data = new Facility();
        $facility_name = $request->form_facility_name;
        $description = $request->form_description;
        $product_id = $request->form_product_id;

        $data->facility_name = $facility_name;
        $data->description = $description;
        $data->product_id = $product_id;
        $data->created_at = now();
        $data->updated_at = now();

        $data->save();
        return redirect()->route('facility.index')->with('status','Hooray ! Data successfully added');
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
}
