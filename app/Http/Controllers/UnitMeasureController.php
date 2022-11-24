<?php

namespace App\Http\Controllers;

use App\Models\UnitMeasure;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitMeasureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('can:measure.index')->only('index');
         $this->middleware('can:measure.edit')->only('edit','update');
         $this->middleware('can:measure.create')->only('create','store');
         $this->middleware('can:measure.destroy')->only('destroy');
    }

    public function index()
    {
        $measures = UnitMeasure::all();
        return view('measures.index',compact('measures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('measures.create');
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
            'name' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            
        ]);
        $measure = UnitMeasure::create($request->all());

        return redirect()->route('measures.index')->with('guardar', 'ok');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitMeasure  $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function show(UnitMeasure $unitMeasure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitMeasure  $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitMeasure $measure)
    {
        return view('measures.edit',compact('measure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitMeasure  $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitMeasure $measure)
    {
        $request->validate([
            'name' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            
        ]);
        $measure->update($request->all());

        return redirect()->route('measures.index')->with('guardar', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitMeasure  $unitMeasure
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitMeasure $measure)
    {
        $measure->delete();
        return redirect()->route('measures.index')->with('guardar', 'ok');

    }
}
