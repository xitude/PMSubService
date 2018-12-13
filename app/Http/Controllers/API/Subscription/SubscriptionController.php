<?php

namespace App\Http\Controllers\API\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PMC\Product\Product;
use PMC\Subscription\Subscription;

class SubscriptionController extends Controller
{
    /**
     * @param Request $request
     * @return array|Request|string
     */
    public function index(Request $request)
    {
        if($msisdn = $request->input('msisdn')){

            $subscription = Subscription::where('msisdn', $msisdn)->with(['products', 'subscribers'])->first();

            $response = [
                'data' => $subscription
            ];

            return response($response, 200)->withHeaders([
                'Content-Type' => 'application/vnd.api+json',
            ]);

        }

        $subscriptions = Subscription::with(['products', 'subscribers'])->get();

        $response = [
            'data' => $subscriptions
        ];

        return response($response, 200)->withHeaders([
            'Content-Type' => 'application/vnd.api+json',
        ]);

    }

    /**
     * @param Request $request
     * @param string $format
     * @return array|Request|string
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $format = 'json')
    {
        $this->validate($request, [
            'msisdn' => 'required|string',
            'product_id' => 'required|string'
        ]);

        $subscription = Subscription::where('msisdn', $request->input('msisdn'));

        $product = Product::where('slug', $request->input('product_id'))->first();

        if(!$product){
            $response = [
                'error' => 'The product "'.$request->input('product_id').'" has not found',
            ];

            return response($response, 404)->withHeaders([
                'Content-Type' => 'application/vnd.api+json',
            ]);
        }

        if($subscription->count() > 0){
            $subscription = $subscription->first();
        }else{

            $subscription = Subscription::create([
                'msisdn' => $request->input('msisdn'),
            ]);
        }

        $user = auth()->user();

        if(!$subscription->subscribers->contains($user->id)){
            $subscription->subscribers()->attach($user);
        }

        if($product){
            if(!$subscription->products->contains($product->id)) {
                $subscription->products()->attach($product);
            }
        }

        $subscription = Subscription::find($subscription->id)->with(['products', 'subscribers'])->first();

        return request()->json([
            'data' => $subscription
        ]);
    }

    /**
     * @param Request $request
     * @param $msisdn
     * @param null $product_id
     * @param string $format
     * @return array|Request|string
     * @throws \Illuminate\Validation\ValidationException
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'msisdn' => 'required',
        ]);

        $msisdn = $request->input('msisdn');
        $user = auth()->user();

        $subscription = Subscription::where('msisdn', $msisdn)->first();

        if($product = Product::where('slug', $request->input('product_id'))->first()){
            $subscription->products()->detach($product);
            if($subscription->products->count() < 1){
                $subscription->subscribers()->detach($user);
            }
        }else{
            $subscription->products()->detach();
            $subscription->subscribers()->detach($user);
        }

        $subscription = Subscription::where('msisdn', $msisdn)->with(['products', 'subscribers'])->first();

        $response = [
            'data' => $subscription
        ];

        return response($response, 200)->withHeaders([
            'Content-Type' => 'application/vnd.api+json',
        ]);

    }
}
