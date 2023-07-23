<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComputerController extends Controller
{

    private static function getdata(){ // declaring the data that we have (asuming we working without DB)
        return [
            ['id' => 1 , 'model' => 'Hp' , 'price' => 1200] , 
            ['id' => 2 , 'model' => 'Mac' , 'price' => 2000] , 
            ['id' => 3 , 'model' => 'Dell' , 'price' => 2300] ,
            ['id' => 4 , 'model' => 'Samsung' , 'price' => 1900] 

        ];
    }
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
            return view('computers.index' , [
                'computers' => self::getdata() // self means the class we are in its like (this.)
            ]); 
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($computer)
    {
        // show used to display cerian page 
        $computers = self::getdata(); // first we get qaccess we data bu accessing the function getdata() ;
        $index = array_search($computer, array_column($computers, 'id'));
         // here we are detecting the location id located in 

         if($index === false) {
            abort(404) ; 
        }
            return view('computers.show', [ // place where we want to display data in 
               
                'computer'=> $computers[$index]

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
