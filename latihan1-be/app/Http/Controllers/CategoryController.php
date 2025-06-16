<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();

        if ($category->isEmpty()) {
            return response()->json(['message' => 'Data not found'], 200);
        }

        return response()->json([

            "message" => "Success",
            "data" => $category
        ] );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json([
            "message" => "Success",
            "data" => $category
        ] );
    }

    public function show(Category $category){
        $category = Category::find($id);

        if(!$category){
            return response()->json(['message' => 'Data not found'], 200);
        }

        return response()->json([
            "message" => "Success",
            "data" => $category
        ] );
    }



}
