<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $data['result'] = Booking::orderBy('booking_date')->orderBy('start_time')->paginate(100);
        return view('admin.bookings.index', $data);
    }

    public function upcoming()
    {
        $data['result'] = Booking::orderBy('booking_date')->orderBy('start_time')->where('booking_date', '>=', date('Y-m-d'))->paginate(100);
        return view('admin.bookings.index', $data);
    }

    public function past()
    {
        $data['result'] = Booking::orderBy('booking_date')->orderBy('start_time')->where('booking_date', '<', date('Y-m-d'))->paginate(100);
        return view('admin.bookings.index', $data);
    }

    public function edit($id)
    {
        $data['result'] = Booking::findOrFail($id);
        return view('admin.bookings.edit', $data);
    }

    public function update(Request $request)
    {
        $dataID = $request->input('dataID');

        try {
            $validated = $request->validate([
                // 'doctor_remarks' => 'required|string',
                'status' => 'required',
            ]);

            $booking = Booking::findOrFail($dataID);
            $booking->update($validated);

            session()->flash('success', 'Booking updated successfully!');

            return response()->json([
                'status' => 'success',
                'message' => 'Booking updated successfully!',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'error_type' => 'form',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            // dd($e);
            return response()->json([
                'status' => 'error',
                'error_type' => 'server',
                'message' => 'Something went wrong. Please try again later.',
                'console_message' => $e->getMessage(),
            ], 500);
        }
    }
}
