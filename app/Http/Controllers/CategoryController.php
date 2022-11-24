<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Suplier;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:category.index')->only('index');
         $this->middleware('can:category.edit')->only('edit','update');
         $this->middleware('can:category.create')->only('create','store');
         $this->middleware('can:category.destroy')->only('destroy');
    }

    public function index()
    {
        $categories = Category::all();
        

        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:250',
            
        ]);
        $category = Category::create($request->all());

        return redirect()->route('categories.index')->with('guardar', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:50',
            
        ]);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('guardar', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('guardar', 'ok');

    }
}
