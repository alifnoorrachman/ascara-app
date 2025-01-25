<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::with(['service'])->latest()->paginate(4);
        return view('admin.works.index', compact('works'));
    }

    public function create()
    {
        // $categories = Category::all();
        $services = Service::all();
        return view('admin.works.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'service_id' => 'required|exists:services,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('works', 'public');
        }

        Work::create($validatedData);

        return redirect()
            ->route('admin.works.index')
            ->with('success', 'Work created successfully.');
    }

    public function edit(Work $work)
    {
        // $categories = Category::all();
        $services = Service::all();
        return view('admin.works.edit', compact('work', 'services'));
    }

    public function update(Request $request, Work $work)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'required',
            'service_id' => 'required|exists:services,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($work->image) {
                Storage::delete('public/' . $work->image);
            }

            // Store new image
            $path = $request->file('image')->store('public/works');
            $validatedData['image'] = $request->file('image')->store('works', 'public');
        }

        $work->update($validatedData);

        return redirect()
            ->route('admin.works.index')
            ->with('success', 'Work updated successfully.');
    }

    public function destroy(Work $work)
    {
        // Delete image if exists
        if ($work->image) {
            Storage::delete('public/' . $work->image);
        }
        
        $work->delete();

        return redirect()
            ->route('admin.works.index')
            ->with('success', 'Work deleted successfully.');
    }
}

