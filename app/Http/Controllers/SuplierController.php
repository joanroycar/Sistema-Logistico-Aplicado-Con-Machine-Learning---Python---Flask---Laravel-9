<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('can:suplier.index')->only('index');
         $this->middleware('can:suplier.edit')->only('edit','update');
         $this->middleware('can:suplier.create')->only('create','store');
         $this->middleware('can:suplier.destroy')->only('destroy');
    }

    public function index()
    {
        $supliers= Suplier::all();
        return view('supliers.index',compact('supliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supliers.create');
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
            'email' => 'required|email',
            'ruc_number' => 'required|numeric',
            'address' => 'required|max:50',
            'phone' => 'required|numeric',

            
        ]);

        $suplier = Suplier::create($request->all());
        return redirect()->route('supliers.index')->with('guardar', 'ok');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function show(Suplier $suplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplier $suplier)
    {
        
        return view('supliers.edit',compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suplier $suplier)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'ruc_number' => 'required|numeric',
            'address' => 'required|max:50',
            'phone' => 'required|numeric',

            
        ]);

        $suplier->update($request->all());
        return redirect()->route('supliers.index')->with('guardar', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplier $suplier)
    {
        $suplier->delete();

        return redirect()->route('supliers.index')->with('guardar', 'ok');

    }
}
