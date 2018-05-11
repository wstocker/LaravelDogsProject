<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all dog names.
        $dogs=Dog::all();
        return view('index',compact('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a new dog name.
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->post('dog_name'))
        {
           // Save new Dog entry from post.
           try 
           {
             $dog = new Dog();
             $dog->name=$request->post('dog_name');
             $dog->save();
	         return response()->json($request);
          } 
         
          // If save failed report the error.
          catch (Exception $e) {
             report($e);
             return false;
          }
       }
    }
}