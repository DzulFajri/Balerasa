<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Booking; // Ensure you have a Booking model

class BookingController extends Controller
{
    public function bookTable(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email',
            'phone' => 'required|string|min:4',
            'date' => 'required|date',
            'time' => 'required|string|min:4',
            'people' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        // Calculate the total amount based on the number of people
        $pricePerPerson = 50000;
        $totalAmount = $pricePerPerson * $validatedData['people'];

        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.serverKey');
        Config::$clientKey = config('midtrans.clientKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Create a new booking in your database
        $booking = Booking::create(array_merge($validatedData, ['total_amount' => $totalAmount]));

        // Prepare transaction parameters
        $params = [
            'transaction_details' => [
                'order_id' => $booking->id, // Use the booking ID as the order ID
                'gross_amount' => $totalAmount, // Amount in IDR
            ],
            'customer_details' => [
                'first_name' => $validatedData['name'],
                'last_name' => '',
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
            ],
            'item_details' => [
                [
                    'id' => 'table_reservation',
                    'price' => $pricePerPerson,
                    'quantity' => $validatedData['people'],
                    'name' => 'Table Reservation'
                ]
            ],
            'custom_field1' => "Date: {$validatedData['date']}, Time: {$validatedData['time']}, People: {$validatedData['people']}, Message: {$validatedData['message']}"
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function handleCallback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $notification = new \Midtrans\Notification();

        $orderId = $notification->order_id;
        $transactionStatus = $notification->transaction_status;
        $fraudStatus = $notification->fraud_status;

        // Find the booking by ID
        $booking = Booking::find($orderId);

        if ($booking) {
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'challenge') {
                    $booking->status = 'challenge';
                } else if ($fraudStatus == 'accept') {
                    $booking->status = 'completed';
                }
            } else if ($transactionStatus == 'settlement') {
                $booking->status = 'completed';
            } else if ($transactionStatus == 'cancel' ||
                    $transactionStatus == 'deny' ||
                    $transactionStatus == 'expire') {
                $booking->status = 'failed';
            } else if ($transactionStatus == 'pending') {
                $booking->status = 'pending';
            }

            $booking->save();
        }

        return response()->json(['status' => 'ok']);
    }
}
