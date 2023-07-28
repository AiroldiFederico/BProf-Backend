<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Sponsorship;
use App\Models\Admin\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BraintreeController extends Controller
{
    public function index(){
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $sponsorships = Sponsorship::all();
        $token = $gateway->ClientToken()->generate();

        return view('admin.teachers.braintree',compact('sponsorships'), [
            'token' => $token
        ]);
    }
    public function token(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        $userId = Auth::id(); 
        $user = User::find($userId);

        $teacherID = User::find($userId)->teacher->id;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $user->name,
                'lastName' => $user->surname,
                'email' => $user->email,
                'phone' => $teacherID
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            $sponsorId = null;

            if ($amount == 9.99) {
                $sponsorId = 1;
            }elseif ($amount == 5.99) {
                $sponsorId = 2;
            }elseif ($amount == 2.99) {
                $sponsorId = 3;
            }

            Teacher::find($teacherID)->sponsorships()->attach($sponsorId);

            return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }


}

    

