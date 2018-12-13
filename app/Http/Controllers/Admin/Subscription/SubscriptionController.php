<?php

namespace App\Http\Controllers\Admin\Subscription;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PMC\Subscription\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();

        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function show($msisdn)
    {
        $subscription = Subscription::where('msisdn', $msisdn)->first();

        return view('admin.subscriptions.show', compact('subscription'));
    }

    public function truncate()
    {
        $subscriptions = Subscription::all();

        foreach($subscriptions as $subscription){
            $subscription->subscribers()->detach();
            $subscription->products()->detach();
            $subscription->delete();
        }

        return redirect()->back();
    }
}
