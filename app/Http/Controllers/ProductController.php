<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //danh sách sản phẩm
    public function index(){
        $products = Product::paginate(10);
        return view('products.index',compact('products'));
    //     $products = DB::table('products')
    //     ->join('categories', 'category_id', '=', 'categories.id')
    //     ->select('products.*','name')
    //     ->orderByDesc('id')
    //     ->get();
    // return view('products.index', compact('products'));
    }
    //hiển thị form create
    public function create(){
        $categories = DB::table('categories')->get();
        return view('products.create',compact('categories'));
    }
    //lưu dữ liệu của form create
    public function store(Request $request){
        $data = [
            'title' =>$request['title'],
            'thumbnail' =>$request['thumbnail'],
            'description' =>$request['description'],
            'price' =>$request['price'],
            'quantity' =>$request['quantity'],
            'category_id' =>$request['category_id']
        ];
        DB::table('products')->insert($data);
        return redirect()->route('product.index');
    }
    //Xóa sản phẩm
    public function destroy($id){
        DB::table('products')->delete($id);
        return redirect()->route('product.index');
    }
    //hiển thị form edit
    public function edit($id){
        $product = DB::table('products')
        ->where('id', $id)
        ->first();
        $categories = DB::table('categories')->get();
        return view('products.edit', compact('product', 'categories'));
    }
    //cạp nhật dữ liệu lên database
    public function update(Request $request){
        $data = [
            'title' =>$request['title'],
            'thumbnail' =>$request['thumbnail'],
            'description' =>$request['description'],
            'price' =>$request['price'],
            'quantity' =>$request['quantity'],
            'category_id' =>$request['category_id']
        ];
        DB::table('products')->where('id', $request['id'])->update($data);
        return redirect()->route('product.index');
    }
    public function test(){
        Product::query()->find(101)->update([
            'title' => 'Update data'
        ]);
        $products = Product::orderByDesc('id')->get();
        return $products;
    }
}
