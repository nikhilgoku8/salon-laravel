<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Show page
    public function index()
    {
        return view('front.payment');
    }

    // Create Razorpay order
    public function createOrder(Request $request)
    {
        try {
            $api = new Api(
                config('services.razorpay.key'),
                config('services.razorpay.secret')
            );

            $order = $api->order->create([
                'receipt' => 'order_' . time(),
                'amount' => 50000,
                'currency' => 'INR'
            ]);
            
            // return response()->json($order);
            // dd($order['id']);
            
            // return ;
            return response()->json($order['id']);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Verify payment
    public function verifyPayment(Request $request)
    {
        $data = $request->all();

        $generated_signature = hash_hmac(
            'sha256',
            $data['razorpay_order_id'] . "|" . $data['razorpay_payment_id'],
            config('services.razorpay.secret')
        );

        $payment = Payment::where('razorpay_order_id', $data['razorpay_order_id'])->first();
        
        if ($generated_signature === $data['razorpay_signature']) {
            
            $payment->update([
                    'razorpay_payment_id' => $data['razorpay_payment_id'],
                    'status' => 'successful',
                ]);
            return response()->json(['success' => true]);
        }

        $payment->update([
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'status' => 'failed',
            ]);

        return response()->json(['success' => false], 400);
    }

    public function markFailed(Request $request)
    {
        $payment = Payment::where('razorpay_order_id', $request->razorpay_order_id)->first();

        if ($payment && !in_array($payment->status, ['successful', 'failed'])) {
            $payment->update([
                'status' => $request->status,
                'error_json' => $request->error 
                    ? json_encode($request->error) 
                    : null,
            ]);
        }

        return response()->json(['ok' => true]);
    }
}
