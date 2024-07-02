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
    public function checkout(Request $request)
    {
        $data = $request->all();
        $totalPoints = 0;
        $totalPrice = 0;

        foreach ($data as $key => $value) {
            if (str_starts_with($key, 'form_quantity') && $value > 0) {
                $product_id = str_replace('form_quantity', '', $key);
                $product = DB::table('products')->where('id', $product_id)->first();

                if ($product) {
                    $quantity = $value;
                    $price = $product->price * $quantity;
                    $totalPrice += $price;

                    // Calculate points
                    if (in_array($product->product_type_id, [2, 3, 4])) { // Deluxe, Superior, Suite
                        $totalPoints += 5 * $quantity;
                    } else {
                        $totalPoints += floor($price / 300000);
                    }

                    // Save transaction (you need to adjust this part based on your actual table structure)
//                    DB::table('transactions')->insert([
//                        'product_id' => $product->id,
//                        'quantity' => $quantity,
//                        'total_price' => $price,
//                        'user_id' => auth()->id(), // Assuming you have user authentication
//                        'created_at' => now(),
//                        'updated_at' => now(),
//                    ]);
                }
            }
        }
        dd($totalPoints, $totalPrice);

        // Update user points (you need to adjust this part based on your actual table structure)
//        DB::table('users')->where('id', auth()->id())->increment('poin', $totalPoints);
//
//        return redirect()->back()->with('status', 'Checkout successful! You earned ' . $totalPoints . ' points.');
    }
}
