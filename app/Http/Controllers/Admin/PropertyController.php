<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function index()
    {
        return view('admin.properties.index', [
            'properties'=>Property::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $property=new Property();
        $property->fill([
            'surface'=>10,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0,
            'city'=>'ghent',
            'postal_code'=>'9000',
            'sold'=>false,
        ]);

        return view('admin.properties.form', [
            'property'=>$property
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        return to_route('admin.property.index')->with('success','The Property has been Created.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
