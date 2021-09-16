<?php

namespace App\Http\Controllers;
use App\Models\Fixed_income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'currency' => 'required|string',
            'category_id' => 'required',
            'date'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=> 'you must fill all the fields'], 200);
        }
        try {
            $inputs = $request->all();
            $startDate = $inputs['date'];
            $date = Carbon::parse(strtotime($startDate))->format('Y-m-d');
            $fixed_expense = new Fixed_income();
            $fixed_expense->title = $inputs['title'];
            $fixed_expense->description = $inputs['description'];
            $fixed_expense->quantity = $inputs['quantity'];
            $fixed_expense->currency = $inputs['currency'];
            $fixed_expense->category_id = $inputs['category_id'];
            $fixed_expense->date = $date;
            $fixed_expense->save();
            return response()->json(['success' => true, 'message' => 'added successfully'], 200);
        }
        catch (\Exception $e){
            error_log($e->getMessage());
        }
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
