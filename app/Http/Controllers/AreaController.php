<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:area.index')->only('index');
         $this->middleware('can:area.edit')->only('edit','update');
         $this->middleware('can:area.create')->only('create','store');
         $this->middleware('can:area.destroy')->only('destroy');
    }

    public function index()
    {
        $areas = Area::all();
        

        return view('areas.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.create');
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
            'name' => 'required|max:50',
            
        ]);
        $area = Area::create($request->all());

        return redirect()->route('areas.index')->with('guardar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        return view('areas.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name' => 'required|max:50',
            
        ]);
        $area->update($request->all());

        return redirect()->route('areas.index')->with('guardar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index')->with('guardar', 'ok');
    }
}
