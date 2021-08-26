<?php

namespace App\Http\Controllers;

use App\Models\Current_income;
use Illuminate\Http\Request;

class CurrentIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $current_income = Current_income::all();
        return response()->json([
        'success'=>true,
        'items'=>$current_income],200);
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
        $inputs = $request->all();
        $recurring_income = new Current_income();
        $recurring_income->title = $inputs['title'];
        $recurring_income->description = $inputs['description'];
        $recurring_income->quantity= $inputs['quantity'];
        $recurring_income->currency=$inputs['currency'];
        $recurring_income->category=$inputs['category'];
 
        $recurring_income->save();
        return response()->json(['success'=>true],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Current_income  $current_income
     * @return \Illuminate\Http\Response
     */
    public function show(Current_income $current_income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Current_income  $current_income
     * @return \Illuminate\Http\Response
     */
    public function edit(Current_income $current_income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Current_income  $current_income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Current_income $current_income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Current_income  $current_income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        // dd($request->all()); 
        // file_put_contents(__DIR__.'/test.json', json_encode($request->ids));
        $ids = $request->ids;

        try {
            Current_income::find($ids)->each(function ($item, $key) {
                $item->delete();

            });
            return response()->json($ids);

        }
        catch(Exception $e) {
            return  response()->json($ids);
        }
    }
}
