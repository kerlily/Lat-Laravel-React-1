<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'Data not found'], 200);
        }

        return response()->json([
            "message" => "Success",
            "data" => $products
        ] );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category_id' => 'required|exists:category,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            "message" => "Success",
            "data" => $product
        ] );
    }

    public function show(string $id){
        if (!$product = Product::find($id)) {
            return response()->json(['message' => 'Data not found'], 200);
        }

        $product = Product::find($id);
        return response()->json([
            "message" => "Success",
            "data" => $product
        ] );
    }
}
