<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class BookingController extends Controller
{
    public function index()
    {
        $data['result'] = Appointment::orderBy('appointment_date')->paginate(100);
        return view('admin.appointments.index', $data);
    }

    public function upcoming()
    {
        $data['result'] = Appointment::orderBy('appointment_date')->where('appointment_date', '>=', date('Y-m-d'))->paginate(100);
        return view('admin.appointments.index', $data);
    }

    public function past()
    {
        $data['result'] = Appointment::orderBy('appointment_date')->where('appointment_date', '<', date('Y-m-d'))->paginate(100);
        return view('admin.appointments.index', $data);
    }

    public function edit($id)
    {
        $data['result'] = Appointment::findOrFail($id);
        return view('admin.appointments.edit', $data);
    }

    public function update(Request $request)
    {
        $dataID = $request->input('dataID');

        try {
            $validated = $request->validate([
                'doctor_remarks' => 'required|string',
                'status' => 'required',
            ]);

            $appointment = Appointment::findOrFail($dataID);
            $appointment->update($validated);

            session()->flash('success', 'Appointment updated successfully!');

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment updated successfully!',
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
