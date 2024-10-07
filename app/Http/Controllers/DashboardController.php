<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function show()
    {
        $subscriptions = Subscription::where('user_id', Auth::id())->get();
        $price = Subscription::where('user_id', Auth::id())->sum('price');


        return view('pages.dashboard', [
            "subscriptions" => $subscriptions,
            "price" => $price,
        ]);
    }


    public function store(Request $request)
    {
        $subscription = Subscription::create([
            'platform' => $request->platform,
            'price' => $request->price,
            'billing_at' => $request->billing_at,
            'user_id' => Auth::user()->id,
        ]);
       

       return redirect()->route('dashboard');   
    }

}
