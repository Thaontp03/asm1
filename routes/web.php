<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    $categories = DB::table('categories')->get();
    $products = DB::table('products')
        ->orderBy('title', 'desc')
        ->limit(8)
        ->get();
    return view('index', compact('products','categories'));
})->name('home');
// 
Route::get('/category/{id}', function ($id) {
    $categories = DB::table('categories')->get();
    $category_name=DB::table('categories')->where('id', $id)->first();
    $products = DB::table('products')
        ->where('category_id', '=', $id)
        ->get();
    return view('shop', compact('products','categories'),['category_name'=>$category_name]);
})->name('shop');
// 
Route::get('/product/{id}', function ($id) {
    $categories = DB::table('categories')->get();
    
    $product = DB::table('products')
        ->where('id', $id)
        ->first();
    return view('detail',compact('categories'),['product'=>$product]);
})->name('product.detail'); 
//    
Route::prefix('category')->group(function(){
    Route::get('/list',[CategoryController::class, 'index'])->name('category.index');
});
Route::get('/test', [ProductController::class, 'test'])->name('product.test');
Route::get('/dashboard', [ProductController::class, 'index'])->name('product.index');
Route::get('/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/create', [ProductController::class, 'store'])->name('product.store');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/edit/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');