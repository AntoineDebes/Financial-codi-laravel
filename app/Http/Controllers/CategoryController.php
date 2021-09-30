<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Current_expense;
use App\Models\Current_income;
use App\Models\Fixed_expense;
use App\Models\Fixed_income;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Category[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse
     */
    public function index(){
        $category = Category::all(); 
        return $category;
    }
    public function getCategory(){
        $items = Category::all();
        return response()->json([
        'success'=>true,
        'items'=>$items],200);
    }

    public function getamount($id){

        $currentexp = Current_expense::all()
        ->where('category_id','=',$id) ;
           if(!empty($currentexp)){
            $items = array();
            foreach ($currentexp as $p) {
                $items[] = $p->quantity;

                }
              $currentexp=$items;

                $length = sizeof($currentexp);
                $i = 0;
                $sum=0;
                while($i < $length)
                {
                 $sum=$sum+$currentexp[$i];
                 $i++;
                }

                $currentexp=$sum;
           }
           else{
              $currentexp=0;
           }
        $currentinc = Current_income::all()
         ->where('category_id','=',$id) ;
         if(!empty($currentinc)){
            $items = array();
            foreach ($currentinc as $p) {
                $items[] = $p->quantity;

                }
              $currentinc=$items;

                $length = sizeof($currentinc);
                $i = 0;
                $sum=0;
                while($i < $length)
                {
                 $sum=$sum+$currentinc[$i];
                 $i++;
                }

                $currentinc=$sum;
           }
           else{
              $currentinc=0;
           }

         $fixedexp= Fixed_expense::all()
         ->where('category_id','=',$id) ;
         if(!empty($fixedexp)){
            $items = array();
            foreach ($fixedexp as $p) {
                $items[] = $p->quantity;

                }
              $fixedexp=$items;

                $length = sizeof($fixedexp);
                $i = 0;
                $sum=0;
                while($i < $length)
                {
                 $sum=$sum+$fixedexp[$i];
                 $i++;
                }

                $fixedexp=$sum;
           }
           else{
              $fixedexp=0;
           }

        $fixedinc =Fixed_income::all()
        ->where('category_id','=',$id) ;
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
           }
           else{
              $fixedinc=0;
           }

        $items=[$currentexp,$currentinc,$fixedexp,$fixedinc];

        return response()->json($items,200);
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

}
