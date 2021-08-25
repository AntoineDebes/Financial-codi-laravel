<?php

namespace App\Http\Controllers;

use App\Models\Current_expense;
use Illuminate\Http\Request;

class CurrentExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $current_expense = Current_expense::all();
        return response()->json([
        'success'=>true,
        'current expense'=>$current_expense],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Current_expense  $current_expense
     * @return \Illuminate\Http\Response
     */
    public function show(Current_expense $current_expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Current_expense  $current_expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Current_expense $current_expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Current_expense  $current_expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Current_expense $current_expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Current_expense  $current_expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        // dd($request->all()); 
        // file_put_contents(__DIR__.'/test.json', json_encode($request->ids));
        $ids = $request->ids;

        try {
            Current_expense::find($ids)->each(function ($product, $key) {
                $product->delete();

            });
            return response()->json($ids);

        }
        catch(Exception $e) {
            return  response()->json($ids);
        }
    }
}
