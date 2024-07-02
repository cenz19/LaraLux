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
        // Start a transaction to ensure data consistency
        DB::beginTransaction();
        try {
            // Insert a transaction record and get the transaction ID
            $transaction_id = $this->insertTransaction();

            // Calculate total points and total price including tax
            foreach ($data as $key => $value) {
                if (str_starts_with($key, 'form_quantity') && $value > 0) {
                    $product_id = str_replace('form_quantity', '', $key);
                    $product = DB::table('products')->where('id', $product_id)->first();

                    if ($product) {
                        $quantity = $value;
                        $price = $product->price * $quantity;
                        $totalPrice += $price;

                        // Calculate points
                        $totalPoints += $this->calculatePoints($product, $quantity, $price);

                        // Save product transaction
                        $this->insertProductTransaction($transaction_id, $product->id, $quantity, $price);
                    }
                }
            }
            // Update the total price in the transaction record including tax
            $this->updateTransactionTotal($transaction_id, $totalPrice);
            // Update user points (you need to adjust this part based on your actual table structure)
            $this->updateUserPoints(1, $totalPoints); // Assuming user ID 1 for demonstration
            // Commit the transaction
            DB::commit();
            // Return a response or redirect as needed
            return view('transaction.history')->with('status', 'Checkout successful! You earned ' . $totalPoints . ' points.');
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();
            dd($e->getMessage()); // Handle the error gracefully in your application
        }
    }

    private function insertTransaction()
    {
        // Insert a transaction record and return the transaction ID
        return DB::table('transactions')->insertGetId([
            'user_id' => 1, // Replace with auth()->id() if using authentication
            'total_price' => 0, // Placeholder for now, will update after calculating total price
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function calculatePoints($product, $quantity, $price)
    {
        // Calculate points based on product type
        if (in_array($product->product_type_id, [2, 3, 4])) { // Deluxe, Superior, Suite
            return 5 * $quantity;
        } else {
            return floor($price / 300000);
        }
    }

    private function insertProductTransaction($transaction_id, $product_id, $quantity, $price)
    {
        // Save product transaction
        DB::table('product_transactions')->insert([
            'product_id' => $product_id,
            'transaction_id' => $transaction_id,
            'quantity' => $quantity,
            'price' => $price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function updateTransactionTotal($transaction_id, $totalPrice)
    {
        // Update the total price in the transaction record including tax
        DB::table('transactions')->where('id', $transaction_id)->update([
            'total_price' => $totalPrice * 111/100, // Assuming tax is 11%
        ]);
    }

    private function updateUserPoints($user_id, $totalPoints)
    {
        // Update user points (you need to adjust this part based on your actual table structure)
        DB::table('users')->where('id', $user_id)->increment('points', $totalPoints);
    }
}
