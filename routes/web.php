<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use App\Http\Controllers\Ptb1Controller;
use App\Http\Controllers\CalculateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ptb1', function(){
    return view('ptb1');
});
// Route::post('ptb1',function(Request $req){
//     $a=$req->input('a');
//     $b=$req->input('b');
//     if($a==0)
//         if($b==0)
//             $kq="PT VS nghiệm";
//         else $kq="PT VN"  ;  
//     else $kq="PT có Nghiệm X=".round(-$b/$a,1);
//     return view('ptb1',['kq'=>$kq,'a'=>$a,'b'=>$b]);
// })->name('ptb1.post');
//Route::resource('ptb1',Ptb1Controller::class);
Route::post('ptb1',[Ptb1Controller::class,'Giaiptb1'])->name('ptb1.post');

//////////////////////////////

Route::get('/calculate', function(){
    return view('calculate');
});
Route::post('calculate',[CalculateController::class,'Calculator'])->name('calculate.post');

/////////////////////////
Route::get('car-list', function () {
    return view('car-list');
});
Route::resource('cars',CarController::class);
/* Routes này tương ứng với 7 routes này:
1.Route::get('cars', [CarController::class, 'index']);=>name('cars.index')
2.Route::get('cars/create', [CarController::class, 'create']);=>name('cars.create')
3.Route::post('cars', [CarController::class, 'store']);=>name('cars.store')
4.Route::get('cars/{car}', [CarController::class, 'show']);=>name('cars.show')
5.Route::get('cars/{car}/edit', [CarController::class, 'edit']);=>name('cars.edit')
6.Route::put('cars/{car}', [CarController::class, 'update']);=>name('cars.update')
7.Route::delete('cars/{car}', [CarController::class, 'destroy']);=>name('cars.destroy')
*/