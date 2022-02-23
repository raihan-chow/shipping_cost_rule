<?php

namespace App\Http\Controllers;

use App\Models\ShippingRule;
use App\Http\Requests\StoreShippingRuleRequest;
use App\Http\Requests\UpdateShippingRuleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;

class ShippingRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = [];

        $shippingRule = ShippingRule::paginate(20);

        return view('shipping_rule.index')->with('data', $shippingRule)->with('i', ($request->input('page', 1) - 1) * 20);
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
    public function store(Request $request)
    {
        try {
             $allRequest = $request->all();

             $validate = Validator::make($allRequest, [
                'minimumWeight' => ['required'],
                'maximumWeight' => ['required'],
                'deliveryTypes' => ['required'],
                'shippingCost' => ['required'],
                'parcelRoute' => ['required'],
                'expireDate' => ['required'],
             ]);

             if ($validate->fails()) {
                return response()->json(['status' => 400, 'success' => false, 'message' => $validate->errors()]);
             }

             // dd($allRequest);

             $minimumWeight = $request->input('minimumWeight');
             $maximumWeight = $request->input('maximumWeight');
             $shippingCost = $request->input('shippingCost');
             $parcelRoute = $request->input('parcelRoute');
             $deliveryTypes = $request->input('deliveryTypes');
             $expireDate = $request->input('expireDate');

             $shippingRule = [];
             $shippingRule['minimum_weight'] = $minimumWeight;
             $shippingRule['maximum_weight'] = $maximumWeight;
             $shippingRule['parcel_route'] = $parcelRoute;
             $shippingRule['delivery_types'] = $deliveryTypes;
             $shippingRule['expire_date'] = Carbon::parse($expireDate)->format('Y-m-d H:i:s');
             $shippingRule['shipping_cost'] = $shippingCost;

             ShippingRule::create($shippingRule);

             


             return response()->json(['status' => 200, 'success' => true, 'content' => null, 'message' => 'Shipping rule has been created.']);



          } catch (Exception $e) {
             return response()->json(['status' => 500, 'success' => false, 'message' => $e->getMessage()]);
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingRule $shippingRule)
    {
        //dd($shippingRule);
        return view('shipping_rule.view', compact('shippingRule'));
            //->with('shippingRule', json_encode($shippingRule->toArray()));
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
    public function update(Request $request, ShippingRule $shippingRule)
    {

        try {
             $allRequest = $request->all();

             //dd($shippingRule);

             $validate = Validator::make($allRequest, [
                'minimumWeight' => ['required'],
                'maximumWeight' => ['required'],
                'deliveryTypes' => ['required'],
                'shippingCost' => ['required'],
                'parcelRoute' => ['required'],
                'expireDate' => ['required'],
                'shippingRuleId' => ['required'],
             ]);

             if ($validate->fails()) {
                return response()->json(['status' => 400, 'success' => false, 'message' => $validate->errors()]);
             }

             // dd($allRequest);

             $minimumWeight = $request->input('minimumWeight');
             $maximumWeight = $request->input('maximumWeight');
             $shippingCost = $request->input('shippingCost');
             $parcelRoute = $request->input('parcelRoute');
             $deliveryTypes = $request->input('deliveryTypes');
             $expireDate = $request->input('expireDate');

             
             $shippingRule->minimum_weight = $minimumWeight;
             $shippingRule->maximum_weight = $maximumWeight;
             $shippingRule->parcel_route = $parcelRoute;
             $shippingRule->delivery_types = $deliveryTypes;
             $shippingRule->expire_date = Carbon::parse($expireDate)->format('Y-m-d H:i:s');
             $shippingRule->shipping_cost = $shippingCost;


             $shippingRule->save();

             


             return response()->json(['status' => 200, 'success' => true, 'content' => null, 'message' => 'Shipping rule has been updated.']);



          } catch (Exception $e) {
             return response()->json(['status' => 500, 'success' => false, 'message' => $e->getMessage()]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingRule  $shippingRule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingRule $shippingRule)
    {
        $shippingRule->delete();

        return redirect()->route('shipping-rule.index');
    }
}
