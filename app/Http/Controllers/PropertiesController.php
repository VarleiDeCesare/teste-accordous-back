<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
class PropertiesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $order = $request->order;
        return QueryBuilder::for(Property::class)
            ->select("properties.*")
            ->orderBy('owner_email', $order)
            ->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request) {
        $data = $request->all();
        return Property::create($data);
    }

    public function show($contract) {
        if ($contract === "property_id_null") {
            return QueryBuilder::for(Property::class)->select('properties.*')
                ->where('status', '=', '0')
                ->get();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property) {
        $property = Property::findOrFail($property->id);
        $property->delete();
        return $property;
    }
}
