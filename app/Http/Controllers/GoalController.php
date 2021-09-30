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
    public function index(){
        $goal = Goal::all();
        return $goal;
    }

   public function CheckGoal(){
     $goalarray=array();
     $goals= Goal::all();

     foreach ($goals as $goal)
     {
         $start=$goal->start_date;
         $end=$goal->end_date;

          //$currentexp first value
         $currentexp= Current_expense::all()
         ->where(  'date','>=',$start )
         ->where('date','<=',$end ) ;

            if(!empty($currentexp)){
             $items = array();
             foreach ($currentexp as $p) {

                 $items[] = $p->quantity;

               }
               $currentexp=$items;
               $items=[];

                 $length = sizeof($currentexp);
                 $i = 0;
                 $sum=0;
                 while($i < $length)
                 {
                  $sum=$sum+$currentexp[$i];
                  $i++;
                 }

                 $currentexp=$sum;
                 error_log($currentexp);
            }
            else{
               $currentexp=0;
            }

            //////second value
            $currentinc = Current_income::all()
            ->where(  'date','>=',$start )
            ->where('date','<=',$end ) ;
            if(!empty($currentinc)){
               $items = array();
               foreach ($currentinc as $p) {
                   $items[] = $p->quantity;

                   }
                 $currentinc=$items;
                 $items=[];
                   $length = sizeof($currentinc);
                   $i = 0;
                   $sum=0;
                   while($i < $length)
                   {
                    $sum=$sum+$currentinc[$i];
                    $i++;
                   }

                   $currentinc=$sum;
                   error_log($currentinc);
              }
              else{
                 $currentinc=0;
              }
           //third value
            $fixedexp= Fixed_expense::all()
            ->where(  'date','>=',$start )
            ->where('date','<=',$end ) ;
            if(!empty($fixedexp)){
               $items = array();
               foreach ($fixedexp as $p) {

                   $items[] = $p->quantity;

                   }
                 $fixedexp=$items;
                 $items=[];
                   $length = sizeof($fixedexp);
                   $i = 0;
                   $sum=0;
                   while($i < $length)
                   {
                    $sum=$sum+$fixedexp[$i];
                    $i++;
                   }
                   error_log($sum);
                   $fixedexp=$sum;
              }
              else{
                 $fixedexp=0;
              }
           //forth value
           $fixedinc =Fixed_income::all()
           ->where(  'date','>=',$start )
           ->where('date','<=',$end ) ;
           if(!empty($fixedinc)){
               $items = array();
               foreach ($fixedinc as $p) {
                   $items[] = $p->quantity;

                   }
                 $fixedinc=$items;

                   $length = sizeof($fixedinc);
                   $i = 0;
                   $sum=0;
                   while($i < $length)
                   {
                    $sum=$sum+$fixedinc[$i];
                    $i++;
                   }
                   //echo $sum;
                   $fixedinc=$sum;
                   error_log($fixedinc);
              }
              else{
                 $fixedinc=0;
              }
           /////////// final value
           $inc=$fixedinc+$currentinc;
           $exp= $fixedexp+$currentexp;
           $answer=$inc-$exp;
           error_log($answer);
            $final= $answer - $goal->amount ;
            error_log($final);
            array_push($goalarray,$final);


     }//end of for each

     return $goalarray;
   }//end  of the checkgoal
    ////////////////////store the goal of the company/////////////////////////
    public function storeGoal(Request $request)
    {
        file_put_contents(__DIR__.'/test.json', json_encode($request->all()));
       $inputs = $request->all();
       $goals= Goal::all();
       if( $goals->isEmpty() ){
         $goal = new Goal();
         $goal->name = $inputs['name'];
         $goal->amount = $inputs['amount'];
         $goal->start_date= $inputs['start_date'];
         $goal->end_date=$inputs['end_date'];
         $goal->save();
         return response()->json([
            'success'=>true],200);

       }
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



