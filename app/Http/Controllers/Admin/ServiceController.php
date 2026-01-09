<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request)
    {

        $subCategoryIds = [];

        if(!empty($request->input('category_id'))){
            $category = Category::find($request->input('category_id'));
            $subCategoryIds = $category->subcategories->pluck('id')->toArray();
        }

        if(!empty($request->input('sub_category_id'))){
            $subCategoryIds = [$request->input('sub_category_id')];
        }

        $data['categories'] = Category::all();
        $data['sub_categories'] = !empty($request->input('category_id'))
            ? SubCategory::where('category_id', $request->input('category_id'))->get()
            : SubCategory::all();
            
        $data['result'] = Service::with('subCategory', 'subCategory.category')
            ->leftJoin('sub_categories', 'services.sub_category_id', '=', 'sub_categories.id')
            ->when($request->input('q'), function ($query) use ($request) {
                return $query->where('services.title', 'LIKE', '%'.$request->input('q').'%');
            })
            ->when($subCategoryIds, function ($query) use ($subCategoryIds) {
                return $query->whereIn('services.sub_category_id', $subCategoryIds);
            })
            ->orderBy('sub_categories.category_id')   // 🔥 Sort by category first
            ->orderBy('services.sub_category_id')
            ->orderBy('services.sort_order')
            ->orderBy('services.title')
            ->select('services.*') // VERY IMPORTANT otherwise pagination breaks
            ->paginate(100);

        return view('admin.services.index', $data);
    }

    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.services.create', $data);
    }

    public function show(Service $service)
    {
        $data['result'] = $service;
        $data['categories'] = Category::all();
        $data['subCategories'] = SubCategory::all();
        return view('admin.services.show', $data);
    }

    public function edit(Service $service)
    {
        $data['result'] = $service;
        $data['categories'] = Category::all();
        $data['subCategories'] = SubCategory::where('category_id', $service->subCategory->category_id)->get();
        return view('admin.services.edit', $data);
    }

    public function store(Request $request)
    {
        return $this->handleServiceRequest($request, new Service(), true);
    }

    public function update(Request $request, Service $service)
    {
        return $this->handleServiceRequest($request, $service, false);
    }

    public function string_filter($string){
        $string = str_replace('--', '-', preg_replace('/[^A-Za-z0-9\-\']/', '', str_replace(' ', '-', str_replace("- ","-", str_replace(" -","-", str_replace("&","and", preg_replace("!\s+!"," ",strtolower($string))))))));
        return $string;
    }

    private function handleServiceRequest(Request $request, Service $service, bool $isNew)
    {
        $dataID = $request->input('dataID');
        try {

            $rules = [
                'sub_category_id' => 'required|exists:sub_categories,id',
                // 'title' => 'required|string|max:255|unique:services,title,'.$dataID,
                'title' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('services', 'title')
                        ->where('sub_category_id', $request->sub_category_id)
                        ->ignore($dataID),
                ],
                'price' => 'required|numeric|min:1',
                'sort_order' => 'required|numeric|min:0',
            ];

            $messages = [
                'required_without' => 'The :attribute field is required'
            ];

            $attributes = [];

            $validator = Validator::make($request->all(), $rules , $messages, $attributes);

            $validated = $validator->validated();

            $validated['slug'] = $this->string_filter($validated['title']);

            // Directly handle the save/update logic here
            if ($isNew) {
                $service = Service::create($validated);
            } else {
                $service->update($validated);
            }

            return response()->json([
                'status' => 'success',
                'message' => $isNew ? 'Service created successfully!' : 'Service updated successfully!',
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

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted!');
    }

    public function bulkDelete(Request $request)
    {
        Service::destroy($request->input('dataID'));

        return response()->json(['success' => true, 'message' => 'Record Deleted']);
    }

}
