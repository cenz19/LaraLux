<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function update(Request $request, Product $product)
    {
        $product_name = $request->form_product_name;
        $product_type_id = $request->form_product_type_id;
        $price = $request->form_price;
        $hotel_id = $request->form_hotel_id;

        $updatedData = $product;
        $updatedData->product_name = $product_name;
        $updatedData->product_type_id = $product_type_id;
        $updatedData->price = $price;
        $updatedData->hotel_id = $hotel_id;
        $updatedData->update();
        return redirect()->route('product.index')->with('status','Horray ! Your data is successfully updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        try {
            $deletedData = $product;
            $deletedData->delete();
            return redirect()->route('product.index')->with('status','Horray ! Your data is successfully deleted !');
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it<br>error message: ".$ex->getMessage();
            return redirect()->route('product.index')->with('status',$msg);
        }
    }
    public function uploadLogo(Request $request)
    {
        $product_id=$request->product_id;
        $product=Product::find($product_id);
        return view('product.formUploadLogo',compact('product'));
    }

    public function simpanLogo(Request $request)
    {
        $file=$request->file("file_logo");
        $folder='logo/product';
        $filename=time()."_".$file->getClientOriginalName();
        $file->move($folder,$filename);
        $hotel=Product::find($request->product_id);
        $hotel->product_image=$filename;
        $hotel->save();
        return redirect()->route('product.index')->with('status','photo terupload');
    }

    public function getEditFormProduct(Request $request)
    {
        $id = $request->id;
        $data = Product::find($id);
        $product_type_controller = ProductType::all();
        $product_hotel_id_controller = Hotel::all();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('product.getEditFormProduct', compact('data','product_type_controller', 'product_hotel_id_controller'))->render()
        ),200);
    }

    public function showProductsByTransactions()
    {
        $hotels = Hotel::with(['products' => function($query) {
                $query->withCount('transactions')
                      ->orderBy('transactions_count', 'desc');
            }])
            ->get();

        return view('products.report', compact('hotels'));
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

    public function getProductByHotelId(Request $request)
    {
        $hotel_id = $request->hotel_id;
        $user = DB::table('users')->where('id', auth()->id())->first();
        $points = $user->points;
        // Retrieve all products where hotel_id matches the given value using query builder
        $products_by_hotel_id = DB::table('products')
            ->join('product_types', 'products.product_type_id', '=', 'product_types.id')
            ->join('hotels', 'products.hotel_id', '=', 'hotels.id')
            ->where('products.hotel_id', $hotel_id)
            ->select('products.*', 'product_types.product_type_name', 'hotels.hotel_name')
            ->get();

        return view('transaction.index', compact('products_by_hotel_id', 'points'));

    }
}
