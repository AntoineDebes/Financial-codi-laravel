<?php

namespace App\Http\Controllers;

use App\Models\Fixed_income;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class FixedIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $items = Fixed_income::all();
        return response()->json([
        'success'=>true,
        'items'=>$items],200);
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
       $fixed_income = new Fixed_income();
       $fixed_income->title = $inputs['title'];
       $fixed_income->description = $inputs['description'];
       $fixed_income->quantity= $inputs['quantity'];
       $fixed_income->currency=$inputs['currency'];
       $fixed_income->category=$inputs['category'];

       $fixed_income->save();
       return response()->json(['success'=>true],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fixed_income  $fixed_income
     * @return \Illuminate\Http\Response
     */
    public function show(Fixed_income $fixed_income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fixed_income  $fixed_income
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixed_income $fixed_income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fixed_income  $fixed_income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fixed_income $fixed_income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fixed_income  $fixed_income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        // dd($request->all()); 
        // file_put_contents(__DIR__.'/test.json', json_encode($request->ids));
        $ids = $request->ids;

        try {
            Fixed_income::find($ids)->each(function ($item, $key) {
                $item->delete();

            });
            return response()->json($ids);

        }
        catch(Exception $e) {
            return  response()->json($ids);
        }
    }
}
 