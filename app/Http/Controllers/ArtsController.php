<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Owner;
use Illuminate\Http\Request;

class ArtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ownerSearch=$request->session()->get('ownerSearch');
        $pictureSearch=$request->session()->get('pictureSearch');
        $brandSearch=$request->session()->get('brandSearch');
        $modelSearch=$request->session()->get('modelSearch');

        $arts=Art::with('owner');
        if ($ownerSearch!=null){
            $arts->where('owner_id','Like',"$ownerSearch");
        }
        if ($pictureSearch!=null){
            $arts->where('picture','Like',"%$pictureSearch%");
        }
        if ($brandSearch!=null){
            $arts->where('brand','Like',"%$brandSearch%");
        }
        if ($modelSearch!=null){
            $arts->where('model','Like',"%$modelSearch%");
        }
        $arts=$arts->get();

        return view("cars.index",[

//            'cars'=>Car::all()
            'arts'=>$arts,
            'owners'=>Owner::orderBy('name')->get(),
            'ownerSearch'=>$ownerSearch,
            'pictureSearch'=>$pictureSearch,
            'brandSearch'=>$brandSearch,
            'modelSearch'=>$modelSearch

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cars.create",[
//            'owners'=>Owner::all()
            'owners'=>Owner::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        Car::create($request->all());
        return redirect()->route("cars.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view("cars.edit",[
            "car"=>$car,
//            "owners"=>Owner::all()
            'owners'=>Owner::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->fill($request->all());
        $car->save();
        return redirect()->route("cars.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route("cars.index");

    }

    public function search(Request $request){
        $request->session()->put('ownerSearch',$request->ownerSearch);
        $request->session()->put('pictureSearch',$request->pictureSearch);
        $request->session()->put('brandSearch',$request->brandSearch);
        $request->session()->put('modelSearch',$request->modelSearch);

        return redirect()->route('cars.index');
    }

    public function forget(Request $request){
        $request->session()->forget('ownerSearch');
        $request->session()->forget('pictureSearch');
        $request->session()->forget('brandSearch');
        $request->session()->forget('modelSearch');

        return redirect()->route('cars.index');

    }

}
