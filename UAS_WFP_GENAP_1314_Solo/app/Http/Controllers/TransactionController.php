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
        $payment = $data['payment'];
        $totalPoints = 0;
        $totalPrice = 0;
        $view = '';
        $status_text = '';
        // Start a transaction to ensure data consistency
        $user = DB::table('users')->where('id', 1)->first();
        $points = $user->points;

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
                        if ($price > 0){
                            $this->insertProductTransaction($transaction_id, $product->id, $quantity, $price);
                        }
                    }
                }
            }
            // Update the total price in the transaction record including tax
            $this->updateTransactionTotal($transaction_id, $totalPrice);
            $totalPriceAfterTax = $totalPrice * 111 / 100;
            if ($payment == 'point') {

                if ($points * 100000 >= $totalPriceAfterTax && $totalPriceAfterTax >= 100000) {
                    $this->deductUserPoints(1, floor($totalPriceAfterTax / 100000)); // Deduct points (implement this method)
                    $status_text = 'Checkout successful! Your point has been deducted by ' . floor($totalPriceAfterTax / 100000) . ' points.';
                } else {
                    DB::rollback();
                    return redirect()->back()->with('status', 'Checkout failed! Insufficient points or invalid transaction.');
                }
            } elseif ($payment == 'cash' && $totalPriceAfterTax > 0) {
                $this->updateUserPoints(1, $totalPoints); // Assuming user ID 1 for demonstration
                $status_text = 'Checkout successful! Your point has been added by ' . $totalPoints . ' points.';
            } else {
                DB::rollback();
                return redirect()->back()->with('status', 'Invalid payment method.');
            }
            DB::commit();
            return redirect()->back()->with('status', $status_text);
//            return view($view)->with('status', $status_text);
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollback();
            dd($e->getMessage()); // Handle the error gracefully in your application
        }
    }

    private function insertTransaction(): int
    {
        // Insert a transaction record and return the transaction ID
        return DB::table('transactions')->insertGetId([
            'user_id' => 1, // Replace with auth()->id() if using authentication
            'total_price' => 0, // Placeholder for now, will update after calculating total price
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function calculatePoints($product, $quantity, $price): float|int
    {
        // Calculate points based on product type
        if (in_array($product->product_type_id, [2, 3, 4])) { // Deluxe, Superior, Suite
            return 5 * $quantity;
        } else {
            return floor($price / 300000);
        }
    }

    private function insertProductTransaction($transaction_id, $product_id, $quantity, $price): void
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

    private function updateTransactionTotal($transaction_id, $totalPrice): void
    {
        // Update the total price in the transaction record including tax
        DB::table('transactions')->where('id', $transaction_id)->update([
            'total_price' => $totalPrice * 111/100, // Assuming tax is 11%
        ]);
    }

    private function updateUserPoints($user_id, $totalPoints): void
    {
        // Update user points (you need to adjust this part based on your actual table structure)
        DB::table('users')->where('id', $user_id)->increment('points', $totalPoints);
    }

    private function deductUserPoints($user_id, $points): void
    {
        // Deduct user points (adjust based on your actual table structure and logic)
        DB::table('users')->where('id', $user_id)->decrement('points', $points);
    }
}
