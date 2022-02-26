<?php

namespace App\Http\Controllers;

use App\Models\ShippingRule;
use App\Http\Requests\StoreShippingRuleRequest;
use App\Http\Requests\UpdateShippingRuleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Exception;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Kodementor Api Documentation",
 *     description="Kodementor Api Documentation",
 *     @OA\Contact(
 *         name="Vijay Rana",
 *         email="info@kodementor.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * ),
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * ),
 */
class ShippingRuleApiController extends Controller
{
    
    /**
     * @OA\Post(
     *     path="/shipping-cost",
     *      operationId="store",
     *      tags={"shipping-cost"},
     *      summary="Store article in DB",
     *      description="Store article in DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"weight", "delivery_route", "delivery_type"},
     *            @OA\Property(property="weight", type="integer", format="numeric", example="20"),
     *            @OA\Property(property="delivery_route", type="string", format="string", example="ISD"),
     *            @OA\Property(property="delivery_type", type="string", format="string", example="regular_service"),
     *         ),
     *      ),
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
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
