<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TimeSlot;

class TimeSlotController extends Controller
{
    public function index()
    {
        $data['result'] = TimeSlot::orderBy('start_time')->paginate(100);
        return view('admin.time-slots.index', $data);
    }

    public function create()
    {
        return view('admin.time-slots.create');
    }

    public function show(TimeSlot $timeSlot)
    {
        $data['result'] = $timeSlot;
        return view('admin.time-slots.show', $data);
    }

    public function edit(TimeSlot $timeSlot)
    {
        $data['result'] = $timeSlot;
        return view('admin.time-slots.edit', $data);
    }

    public function string_filter($string){
        $string = str_replace('--', '-', preg_replace('/[^A-Za-z0-9\-\']/', '', str_replace(' ', '-', str_replace("- ","-", str_replace(" -","-", str_replace("&","and", preg_replace("!\s+!"," ",strtolower($string))))))));
        return $string;
    }

    public function store(Request $request)
    {
        return $this->handleTimeSlotRequest($request, new TimeSlot(), true);
    }

    public function update(Request $request, TimeSlot $timeSlot)
    {

        return $this->handleTimeSlotRequest($request, $timeSlot, false);

    }

    private function handleTimeSlotRequest(Request $request, TimeSlot $timeSlot, bool $isNew)
    {

        $dataID = $request->input('dataID');

        try {
            $validated = $request->validate([
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after:start_time',
                'is_active' => 'required|boolean',
            ]);

            $start = $validated['start_time'];
            $end   = $validated['end_time'];

            // -------------------------------
            // 2. CHECK OVERLAPPING TIME SLOTS
            // (Touching allowed)
            // -------------------------------
            $overlap = TimeSlot::where('id', '!=', $dataID) // ignore same record when updating
                ->where('start_time', '<', $end)
                ->where('end_time', '>', $start)
                ->exists();

            if ($overlap) {
                return response()->json([
                    'status'     => 'error',
                    'error_type' => 'form',
                    'errors'     => [
                        'start_time' => ['This time range overlaps with an existing time slot.'],
                    ],
                ], 422);
            }

            // Directly handle the save/update logic here
            if ($isNew) {
                $timeSlot = TimeSlot::create($validated);
            } else {
                $timeSlot->update($validated);
            }

            session()->flash('success', $isNew ? 'Category created successfully!' : 'Category updated successfully!');

            return response()->json([
                'status' => 'success',
                'message' => $isNew ? 'Category created successfully!' : 'Category updated successfully!',
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

    public function destroy(TimeSlot $timeSlot)
    {
        $timeSlot->delete();
        return redirect()->route('admin.time-slots.index')->with('success', 'Category deleted!');
    }

    public function bulkDelete(Request $request)
    {
        // $dataIDs = $request->input('dataID');

        TimeSlot::destroy($request->dataID);

        return response()->json(['success' => true, 'message' => 'Record Deleted']);
    }
}
