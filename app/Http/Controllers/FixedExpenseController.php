<?php

namespace App\Http\Controllers;

use App\Models\Fixed_expense;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class FixedExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Fixed_expense::all();
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
        // try{
        $inputs = $request->all();
        $fixed_expense = new Fixed_expense();
        $fixed_expense->title = $inputs['title'];
        $fixed_expense->description = $inputs['description'];
        $fixed_expense->quantity= $inputs['quantity'];
        $fixed_expense->currency=$inputs['currency'];
        $fixed_expense->category=$inputs['category'];
        $fixed_expense->save();

        return response()->json(['success'=>true],200);
    // }
    // catch($exception){
    //     return response()->json(['success'=>false , 'message'=>$exception->getMessage()],500)
    // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fixed_expense  $fixed_expense
     * @return \Illuminate\Http\Response
     */
    public function show(Fixed_expense $fixed_expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fixed_expense  $fixed_expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixed_expense $fixed_expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fixed_expense  $fixed_expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fixed_expense $fixed_expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fixed_expense  $fixed_expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {

//         dd($request->all());
         file_put_contents(__DIR__.'/test.json', json_encode($request->ids));
        $ids = $request->ids;

        try {
            Fixed_expense::find($ids)->each(function ($item, $key) {
                $item->delete();

            });
            return response()->json($ids);

        }
        catch(Exception $e) {
            return  response()->json($ids);
        }
    }

    public function getcategories()
    {

        $items = Fixed_expense::all();
        return response()->json([
        'success'=>true,
        'items'=>$items],200);
    }
}
