<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_index_controller =User::all();
        return view('user.index', compact('user_index_controller'));
    }

    public function topUser()
    {
        $top_user = User::withCount('transactions')
                ->orderBy('transactions_count', 'desc')
                ->get();

        return view('user.report', compact('top_user'));
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
        $data = new User();
        $hotel_name = $request->form_name;
        $address = $request->form_email;
        $phone_number = $request->form_password;
        $email = $request->form_role;

        $data->name = $hotel_name;
        $data->email = $address;
        $data->password = $phone_number;
        $data->role = $email;
        $data->points = 0;
        $data->remember_token = $data->getRememberToken();
        $data->created_at = now();
        $data->updated_at = now();

        $data->save();
        return redirect()->route('user.index')->with('status','Hooray ! Data successfully added');
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
    public function destroy(User $user)
    {
        //
        try {
            $deletedData = $user;
            $deletedData->delete();
            return redirect()->route('user.index')->with('status','Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it<br>error message: ".$ex->getMessage();
            return redirect()->route('user.index')->with('status',$msg);
        }
    }
}
