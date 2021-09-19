<?php

namespace App\Http\Controllers;
use App\Models\Current_expense;
use App\Models\Current_income;
use App\Models\Fixed_expense;
use App\Models\Fixed_income;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
  
    //store the goal of the company
    public function storeGoal(Request $request)
    {
       $inputs = $request->all();
       $goals= Goal::all();
        foreach ($goals as $p) {
                 $p->start_date;
            error_log($p->start_date);
            if( ($inputs['start_date'] < $p->start_date && $inputs['end_date'] > $p->end_date ) ||  
             ( $inputs['start_date'] < $p->start_date && $inputs['end_date'] > $p->end_date   )   ) 
             {    
                 return response()->json([
                     'success'=>false],404);

             }
             else{
                $goal = new Goal();
                $goal->name = $inputs['name'];
                $goal->amount = $inputs['amount'];
                $goal->start_date= $inputs['start_date'];
                $goal->end_date=$inputs['end_date'];  
                $goal->save();
                return response()->json([
                    'success'=>true],200);
            }


          }   
    }







}
