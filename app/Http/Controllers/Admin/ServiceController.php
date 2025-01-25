<?php
// app/Http/Controllers/Admin/ServiceController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(5);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('works', 'public');
        }

        Service::create($validatedData);
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::delete('public/' . $service->image);
            }

            // Store new image
            $path = $request->file('image')->store('public/services');
            $validatedData['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validatedData);
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image) {
            Storage::delete('public/' . $service->image);
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully');
    }
}