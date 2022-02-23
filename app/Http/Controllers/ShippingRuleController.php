<?php

namespace App\Http\Controllers;

use App\Models\ShippingRule;
use App\Http\Requests\StoreShippingRuleRequest;
use App\Http\Requests\UpdateShippingRuleRequest;

class ShippingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [];

        $shippingRule = ShippingRule::all();

        return view('shipping_rule.index')->with('data', $shippingRule);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('shipping_rule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShippingRuleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShippingRuleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingRule $shippingRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingRule $shippingRule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShippingRuleRequest  $request
     * @param  \App\Models\ShippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShippingRuleRequest $request, ShippingRule $shippingRule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingRule $shippingRule)
    {
        //
    }
}
