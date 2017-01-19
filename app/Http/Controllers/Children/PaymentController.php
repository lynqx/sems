<?php

namespace App\Http\Controllers\Children;

use App\Http\Controllers\LayoutsMainController;
use App\Models\FeeType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Paystack;

class PaymentController extends LayoutsMainController
{
    //
    public function home($slug)
    {
//      TODO  Do a check to make sure this child in slug belongs to parent
//        dd(Auth::user()->email);
        $parent = Auth::user();
        $child = User::find($slug);
        $fee_types = FeeType::all();
        return View('children.payment', compact('parent','child', 'fee_types'));
    }

    public function redirectToGateway()
    {
        $paystack = new Paystack();
        return $paystack->getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $paystack = new Paystack();
        $paymentDetails = $paystack->getPaymentData();
        dd($paymentDetails);
    }
}
