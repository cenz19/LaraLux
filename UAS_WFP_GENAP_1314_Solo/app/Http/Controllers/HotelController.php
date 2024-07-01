<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Nette\Utils\Type;

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
    public function store(Request $request): \Illuminate\Http\RedirectResponse
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
    public function update(Request $request, Hotel $hotel): \Illuminate\Http\RedirectResponse
    {
        //
        $hotel_name = $request->form_hotel_name;
        $address = $request->form_address;
        $phone_number = $request->form_phone_number;
        $email = $request->form_email;
        $hotel_type_id = $request->form_hotel_type_id;

        $updatedData = $hotel;
        $updatedData->hotel_name = $hotel_name;
        $updatedData->address = $address;
        $updatedData->phone_number = $phone_number;
        $updatedData->email = $email;
        $updatedData->hotel_type_id = $hotel_type_id;
        $updatedData->update();
        return redirect()->route('hotel.index')->with('status','Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel): \Illuminate\Http\RedirectResponse
    {
        try {
              $deletedData = $hotel;
              $deletedData->delete();
              return redirect()->route('hotel.index')->with('status','Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
              $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
              return redirect()->route('hotel.index')->with('status',$msg);
        }
    }

    public function getEditFormHotel(Request $request)
    {
        $id = $request->id;
        $data = Hotel::find($id);
        $hotel_type_controller = HotelType::all();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('hotel.getEditFormHotel', compact('data','hotel_type_controller'))->render()
        ),200);
}




    public function hotel_type_controller_function(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $hotel_type_controller = HotelType::all();
        return view('hoteltype.index', compact('hotel_type_controller'));
    }

    public function store_type(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = new HotelType();
        $type_name = $request->form_type_name;
        $data->hotel_type_name = $type_name;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        return redirect()->route('hoteltype.index')->with('status','Hooray ! Data successfully added');
    }


}
