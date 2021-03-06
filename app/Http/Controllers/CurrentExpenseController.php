<?php

namespace App\Http\Controllers;

use App\Models\Current_expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Validator;

class CurrentExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $current_expense = Current_expense::all();
        return response()->json([
        'success'=>true,
        'items'=>$current_expense],200);
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
        file_put_contents(__DIR__.'/test.json', json_encode($request->all()));
        $validator= Validator::make($request->all(), [
            'startDate'=>'required|date',
            'repetition'=>'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'currency' => 'required|string',
            'category_id' => 'required',
            'endDate'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=> 'you must fill all the fields'], 200);
        }
        try {

            $inputs = $request->all();
            $startDate = $inputs['startDate'];
            $endDate = $inputs['endDate'];
            $repetition = $inputs['repetition'];
            error_log($startDate);
            error_log($endDate);
            error_log($repetition);
            $date1 = new DateTime($startDate);
            $date2 = new DateTime($endDate);
            if ($repetition == 'weekly') {
                $numberOfDays = 7;
            } else if ($repetition == 'monthly') {
                $numberOfDays = 30;
            } else  return response()->json(['success' => false, 'message' => 'Please select a period of time '], 200);
            $difference_in_weeks = floor($date1->diff($date2)->days / $numberOfDays);
            if ($startDate > $endDate) {
                error_log("the start date should be before the end date");
                return response()->json(['success' => false, 'message' => 'the start date should be before the end date'], 200);
            } else {
                $currentDateTime = Carbon::parse(strtotime($startDate))->format('Y-m-d');
                for ($i = 0; $i < $difference_in_weeks; $i++) {
                    $recurring_income = new Current_expense();
                    $recurring_income->title = $inputs['title'];
                    $recurring_income->description = $inputs['description'];
                    $recurring_income->quantity = $inputs['quantity'];
                    $recurring_income->currency = $inputs['currency'];
                    $recurring_income->category_id = $inputs['category_id'];
                    $recurring_income->date = $currentDateTime;
                    $recurring_income->save();
                    $currentDateTime = Carbon::parse(strtotime($currentDateTime))->addDays($numberOfDays);

                }
                return response()->json(['success' => true, 'message' => 'added successfully'], 200);
            }
        }
        catch (\Exception $e){
         error_log($e->getMessage());
    }
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
            Current_expense::find($ids)->each(function ($item, $key) {
                $item->delete();

            });
            return response()->json($ids);

        }
        catch(Exception $e) {
            return  response()->json($ids);
        }
    }
}
