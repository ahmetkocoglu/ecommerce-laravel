<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::with('price:product_id,price,discount_price,discount_rate')
        $products = Product::with('price')
            ->where('deleted_at', null)
            // ->with('rating:product_id,rating')
            // ->with('rating')
            ->with('variation')
            // ->with('campaign')
            // ->with('favorite')
            // ->with('productCategory')
            // ->where("confirm", true)
            //->select(["id", "title", "confirm"])
            ->get();

        return response()->json($products);
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
    public function store(ProductStoreRequest $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required|min:5|max:150',
        // ]);

        // $product = new Product();
        // $product->title = $request->title;
        // $product->seo = $request->seo;

        // $product->save();

        // return response()->json($product);

        return ProductService::store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
