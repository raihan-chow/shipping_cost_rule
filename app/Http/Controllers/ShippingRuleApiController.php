<?php

namespace App\Http\Controllers;

use App\Models\ShippingRule;
use App\Http\Requests\StoreShippingRuleRequest;
use App\Http\Requests\UpdateShippingRuleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;

class ShippingRuleApiController extends Controller
{
    
    public function shippingCost(Request $request)
    {
        try {
             $allRequest = $request->all();



             $validate = Validator::make($allRequest, [
                'weight' => ['required', 'numeric'],
                'delivery_route' => ['required', 'string'],
                'delivery_type' => ['required', 'string'],
             ]);

             if ($validate->fails()) {
                return response()->json(['status' => 400, 'success' => false, 'message' => $validate->errors()]);
             }

             

             $weight = $request->input('weight');
             $deliveryRoute = $request->input('delivery_route');
             $deliveryType = $request->input('delivery_type');

             

             $shippingRuleData = ShippingRule::where('minimum_weight', '<=', $weight)
                                       ->where('maximum_weight', '>=', $weight)
                                       ->where('parcel_route', '=', strtoupper($deliveryRoute))
                                       ->where('delivery_types', '=', $deliveryType)
                                       ->where('expire_date', '>=', Carbon::now()->toDateString())
                                       ->first();

             if( !empty($shippingRuleData) ){
               return response()->json(['status' => 200, 'success' => true, 'message' => 'Shipping rule has been found.', 'shipping_cost' => $shippingRuleData->shipping_cost]);
             }
             else{
               return response()->json(['status' => 500, 'success' => false, 'message' => 'Sorry! Shipping rule not found']);
             }

            

          } catch (Exception $e) {
             return response()->json(['status' => 500, 'success' => false, 'message' => $e->getMessage()]);
          }
    }

    
}
