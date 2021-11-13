<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Jobs\UpdateStatusOfProperty;
use App\Models\Contract;
use App\Models\Property;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ContractController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return QueryBuilder::for(Contract::class)
            ->leftJoin('properties as prop', 'contracts.property_id', '=', 'prop.id')
            ->select('contracts.*')
//            ->with('property')
            ->paginate(15);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request) {
        $data = $request->all();


        $data['document'] = str_replace(['.', '-', '/'], '',$data['document']);

        UpdateStatusOfProperty::dispatch($data['property_id']);

        return Contract::create($data);
    }
}

