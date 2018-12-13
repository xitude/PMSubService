<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PMC\Product\Product;
use PMC\Subscription\Subscription;

class DashboardController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        $products = Product::all();

        return view('admin.dashboard.index', compact('subscriptions', 'products'));
    }
}
