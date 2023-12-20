<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class WalletController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        $userId = Auth::id();
        $package = $request->input('package');
        $coinsToAdd = $this->getCoinsForPackage($package);

        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price' => $this->getStripePriceForPackage($package),
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('purchase.success', ['userId' => $userId]),
            'cancel_url' => route('purchase.cancel'),
        ]);

        return response()->json(['sessionId' => $session->id]);
    }

    public function purchaseSuccess($userId)
    {
        // Handle payment success logic
        $package = Auth::user()->wallet->package;
        $coinsToAdd = $this->getCoinsForPackage($package);

        $wallet = Wallet::where('user_id', $userId)->first();
        $wallet->balance += $coinsToAdd;
        $wallet->save();

        return view('purchase-success', ['balance' => $wallet->balance]);
    }

    public function purchaseCancel()
    {
        // Handle payment cancellation logic
        return view('purchase-cancel');
    }

    private function getCoinsForPackage($package)
    {
        // Define coins for each package
        $packageCoins = [
            'basic' => 50,
            'standard' => 100,
            'premium' => 150,
        ];

        // Return the corresponding coins for the package
        return $packageCoins[$package] ?? 0;
    }

    private function getStripePriceForPackage($package)
    {
        // Define prices in your Stripe dashboard and return the appropriate price ID here
        $priceIds = [
            'basic' => 'price_basic',
            'standard' => 'price_standard',
            'premium' => 'price_premium',
        ];

        return $priceIds[$package] ?? null;
    }
    
}
