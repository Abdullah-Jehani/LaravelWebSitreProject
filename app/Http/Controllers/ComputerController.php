<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\computer;
use Illuminate\Console\View\Components\Alert;
use PHPUnit\Framework\TestStatus\Success;

class ComputerController extends Controller
{

    private static function getdata(){ // declaring the data that we have (asuming we working without DB)
        return [
            // ['id' => 1 , 'model' => 'Hp' , 'price' => 1200] , 
            // ['id' => 2 , 'model' => 'Mac' , 'price' => 2000] , 
            // ['id' => 3 , 'model' => 'Dell' , 'price' => 2300] ,
            // ['id' => 4 , 'model' => 'Samsung' , 'price' => 1900] , 
            // ['id' => 5 , 'model' => 'Victus' , 'price' => 3000] 

        ];
    }
    /**
     * Display a listing of the resource.

     */
    public function index() // home page
    {
            return view('computers.index' , [
                'computers' => computer::all() // self means the class we are in its like (this.)
                // computer::all() => means that export all the data from the class computer
            ]); 
    }
   
        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computers.create') ; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'computer-model' => 'required' , 
            'computer-origin' => 'required' , 
            'computer-price' => 'required|integer' , 
        ]) ; 

        $computer = new computer(); // we create an instance from the class controller that all data stored in .
        $computer->model = strip_tags( $request->input('computer-model'))  ; // here we are assigning the variables we have to computer , as we use the instance $computer we get all the access to the data in our app 
        $computer->origin = strip_tags( $request->input('computer-origin')) ;
        $computer->price = strip_tags( $request->input('computer-price')) ;
        $computer->save() ; 
        return redirect()->route('computers.index') ; 

    }

    /**
     * Display the specified resource.
     */
    public function show($computer)
    {
        
    return view('computers.show' , [
        'computer' => computer::FindorFail($computer)
    ]) ; 
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('computers.edit' , [
            'computer' => computer::findOrfail($id) // it will go and scearch in Db for the ID
        ]) ; 
    }

  
    public function update(Request $request, string $computer)
    {
        $request -> validate([
            'computer-model' => 'required' , 
            'computer-origin' => 'required' , 
            'computer-price' => 'required|integer' , 
        ]) ; 
        $to_update= computer::findorfail($computer);
        $to_update->model = strip_tags( $request->input('computer-model'))  ; // here we are assigning the variables we have to computer , as we use the instance $computer we get all the access to the data in our app 
        $to_update->origin = strip_tags( $request->input('computer-origin')) ;
        $to_update->price = strip_tags( $request->input('computer-price')) ;
        $to_update->save() ; 
        return redirect()->route('computers.index' , $computer) ;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $computer)
    {
        $to_delete = computer::findorfail($computer) ; 
        $to_delete -> delete(); 
        return redirect()->route('computers.index');
    }
}
