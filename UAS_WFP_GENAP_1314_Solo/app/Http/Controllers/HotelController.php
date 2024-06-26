<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use Illuminate\Http\Request;
use App\Models\Hotel;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hotel_index_controller =Hotel::all();
        $hotel_type_controller = HotelType::all();
        return view('hotel.index', compact('hotel_index_controller', 'hotel_type_controller'));
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
        $data = new Hotel();
        $hotel_name = $request->form_hotel_name;
        $address = $request->form_address;
        $phone_number = $request->form_phone_number;
        $email = $request->form_email;
        $hotel_type_id = $request->form_hotel_type_id;

        $data->hotel_name = $hotel_name;
        $data->address = $address;
        $data->phone_number = $phone_number;
        $data->email = $email;
        $data->hotel_type_id = $hotel_type_id;
        $data->created_at = now();
        $data->updated_at = now();

        $data->save();
        return redirect()->route('hotel.index')->with('status','Hooray ! Data successfully added');
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
