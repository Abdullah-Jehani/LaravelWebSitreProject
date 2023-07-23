<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ComputerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StaticController::class, 'index']) ->name('home.index'); 
Route::get('/about', [StaticController::class, 'about']) ->name('home.about');
Route::get('/contact', [StaticController::class, 'contact'])->name('home.contact');

Route::resource('computers' ,(ComputerController::class)) ; // we made a route to entire folder no need to be specific for every elemnt inside , so if we have a ne wcontroller for example Tv's we dont need to assign the operations one by one , we can just write the main route and the resource will configure it by it self . 

// Route::get('/store' , function() {
//     $filter = request('category') ; // ?category=men
//     if(isset($filter)) { // isset means that variable has a value , or there a value assigned to a variable
//         return 'this page display all <span style="color:red;">'.strip_tags($filter).'</span> ' ; 
//     }
//     return 'this page display all <span style="color:red;">Products</span> ' ; 

// }) ; 


Route::get('/store/{category?}/{item?}' ,function($category = null , $item = null) {
if (isset($category)) {
    if(isset($item)) {
        return "<h1>{$item}</h1>" ; 
    }
    return "<h1>{$category}</h1>" ; 
} 
    return "<h1>Main Page</h1>" ; 
}) ; 
