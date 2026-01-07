<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Package;
use App\Models\SubCategory;

class PackageController extends Controller
{
    public function index()
    {
        $data['result'] = Package::orderBy('sort_order')->paginate(100);
        return view('admin.packages.index', $data);
    }

    public function create()
    {
        $data['subCategories'] = SubCategory::with('services')->orderBy('sort_order')->get();
        return view('admin.packages.create', $data);
    }

    public function show(Package $package)
    {
        $data['result'] = $package;
        $data['subCategories'] = SubCategory::with('services')->orderBy('sort_order')->get();
        return view('admin.packages.show', $data);
    }

    public function edit(Package $package)
    {
        $data['result'] = $package;
        $data['subCategories'] = SubCategory::with('services')->orderBy('sort_order')->get();
        return view('admin.packages.edit', $data);
    }

    public function string_filter($string){
        $string = str_replace('--', '-', preg_replace('/[^A-Za-z0-9\-\']/', '', str_replace(' ', '-', str_replace("- ","-", str_replace(" -","-", str_replace("&","and", preg_replace("!\s+!"," ",strtolower($string))))))));
        return $string;
    }

    public function store(Request $request)
    {
        return $this->handlePackageRequest($request, new Package(), true);
    }

    public function update(Request $request, Package $package)
    {

        return $this->handlePackageRequest($request, $package, false);

    }

    private function handlePackageRequest(Request $request, Package $package, bool $isNew)
    {

        $dataID = $request->input('dataID');

        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255|unique:packages,title,'. $dataID,
                'description' => 'required|string',
                'price' => 'required|numeric|min:1',
                'sort_order' => 'required|numeric|min:0',
                'services' => 'required|array|min:2',
                'services.*' => 'required|exists:services,id',
            ]);

            if ($isNew) {
                $validated['created_by'] = session('username');
            }
            $validated['updated_by'] = session('username');

            $validated['slug'] = $this->string_filter($validated['title']);

            // Directly handle the save/update logic here
            if ($isNew) {
                $package = Package::create($validated);
            } else {
                $package->update($validated);
            }

            $package->services()->sync($validated['services']);

            return response()->json([
                'status' => 'success',
                'message' => $isNew ? 'Package created successfully!' : 'Package updated successfully!',
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

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted!');
    }

    public function bulkDelete(Request $request)
    {
        // $dataIDs = $request->input('dataID');

        Package::destroy($request->dataID);

        return response()->json(['success' => true, 'message' => 'Record Deleted']);
    }
}
