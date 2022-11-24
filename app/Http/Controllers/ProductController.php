<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Suplier;
use App\Models\UnitMeasure;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('can:product.index')->only('index');
         $this->middleware('can:product.edit')->only('edit','update');
         $this->middleware('can:product.create')->only('create','store');
         $this->middleware('can:product.destroy')->only('destroy');
    }
    
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    
    public function create()
    {
        $suplier = Suplier::pluck('name','id');
        $measure = UnitMeasure::pluck('name','id');
        $category = Category::pluck('name','id');
        return view('products.create',compact('suplier','measure','category'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            'suplier_id' => 'required',
            'unit_measure_id' => 'required',
            'category_id' => 'required',
            // 'code' => 'required|max:50',
            'stockmin'=>'required|numeric|min:1|max:99999999'
            
        ]);

        $product = Product::create($request->all()+[
            'status'=>'1'
        ]);

        return redirect()->route('products.index')->with('guardar', 'ok');


    }

    public function show(Product $product)
    {
        
    }
    public function edit(Product $product)
    {
        $suplier = Suplier::pluck('name','id');
        $measure = UnitMeasure::pluck('name','id');
        $category = Category::pluck('name','id');
        return view('products.edit',compact('product','suplier','measure','category'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:250',
            'suplier_id' => 'required',
            'unit_measure_id' => 'required',
            'category_id' => 'required',
            // 'code' => 'required|max:50',
            'stockmin' => 'numeric|required|min:1|max:99999999'
            
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('guardar', 'ok');


    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('guardar', 'ok');

    }

    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }
}
