<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;


class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = Movies::all();
        return $movies;
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
    public function addMovie(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'synopsis'=>'required|string|max:255',
            'imgurl'=> 'required|string|max:255',
            'review'=>'required|string|max:255'
        ]);

        if($validator -> fails()){
            return response()->json($validator->errors());
        }
        //$review = $request['review'] != null ? $request['review'] : "";
        DB::table('movies')->insert([
            'name'=>$request['name'],
            'synopsis'=>$request['synopsis'],
            'imgurl'=>$request['imgurl'],
            'review'=> $request['review']
        ]);
        return response() -> json([
            'message' => 'Movie successfully added'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function getMovieById(Request $request)
    {
        //
        $movie = Movies::where('id',(int)$request['id'])->get();
        $json =  json_decode($movie, true);
        if(!empty($json)){
            return response()->json([
                'movie' => $movie,
            ]);
        }
        return response() -> json(['message' => 'Not Data found'],200);
    }

    public function getMoviesByName(Request $request)
    {
        //
        $name = "%".$request['name']."%";
        $movies = Movies::where('name','LIKE',$name)->get();
        $json =  json_decode($movies, true);
        if(!empty($json)){
            return response()->json([
                'reviews' => $movies,
            ]);
        }
        return response() -> json(['message' => 'Not Data found'],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movies $movies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movies $movies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movies $movies)
    {
        //
    }
}
