<?php

namespace App\Http\Controllers;

use App\Models\Candy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandyController extends Controller
{
    /**
     * Display a listing of the resource.
     * index: Fetch all candies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candies = Candy::all();
        return response()->json($candies);
    }

    /**
     * Store a newly created resource in storage.
     * store: Create a new candy.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'type' => 'required|string',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $candy = Candy::create($request->all());
        return response()->json($candy, 201);
    }

    /**
     * Display the specified resource.
     *show: Fetch a specific candy by ID.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candy = Candy::find($id);
        if (!$candy) {
            return response()->json(['error' => 'Candy not found'], 404);
        }
        return response()->json($candy);
    }

    /**
     * Update the specified resource in storage.
     * update: Update a specific candy by ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'type' => 'required|string',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $candy = Candy::find($id);
        if (!$candy) {
            return response()->json(['error' => 'Candy not found'], 404);
        }

        $candy->update($request->all());
        return response()->json($candy, 200);
    }

    /**
     * Remove the specified resource from storage.
     * destroy: Delete a specific candy by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candy = Candy::find($id);
        if (!$candy) {
            return response()->json(['error' => 'Candy not found'], 404);
        }

        $candy->delete();
        return response()->json(['message' => 'Candy deleted'], 200);
    }
}
