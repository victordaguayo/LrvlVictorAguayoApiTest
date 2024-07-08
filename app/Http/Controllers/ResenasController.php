<?php

namespace App\Http\Controllers;

use App\Models\Resenas;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class ResenasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reviews = Resenas::all();
        return $reviews;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addReview(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'idComment'=>'required|int',
            'comment'=>'required|string|max:255',
            'stars'=> 'required|int|max:5'
        ]);

        if($validator -> fails()){
            return response()->json($validator->errors());
        }
        //$review = $request['review'] != null ? $request['review'] : "";
        DB::table('resenas')->insert([
            'idComment'=>$request['idComment'],
            'comment'=>$request['comment'],
            'stars'=>$request['stars']
        ]);
        return response() -> json([
            'message' => 'Review successfully added'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function getFilteredReviews(Request $request)
    {
        $reviews = Resenas::where('idComment',(int)$request['idComment'])->get();
        $json =  json_decode($reviews, true);
        if(!empty($json)){
            return response()->json([
                'reviews' => $reviews,
            ]);
        }
        return response() -> json(['message' => 'Not Data found'],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resenas $resenas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resenas $resenas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resenas $resenas)
    {
        //
    }
}
