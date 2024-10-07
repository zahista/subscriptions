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
        $validated = $request->validate([
            'platform' => 'required',
            'price' => 'required|numeric',
            'billing_at' => 'required|date',
        ],[
            'platform.required' => 'Vyplňte prosím platformu',
            'price.required' => 'Vyplňte prosím cenu',
            'price.numeric' => 'Cena musí být číslo',
            'billing_at.required' => 'Vyplňte prosím datum zúčtování',
            'billing_at.date' => 'Datum zůčtování musí být ve formátu YYYY-MM-DD',
        ]);

        $subscription = Subscription::create([
            'platform' => $request->platform,
            'price' => $request->price,
            'billing_at' => $request->billing_at,
            'user_id' => Auth::user()->id,
        ]);
       

       return redirect()->route('dashboard');   
    }

    public function destroy(Request $request)
    {
        $subscription = Subscription::find($request->id);
        $subscription->delete();

        return redirect()->route('dashboard');
    }

}
