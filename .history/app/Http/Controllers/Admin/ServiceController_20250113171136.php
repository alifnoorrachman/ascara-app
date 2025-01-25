<?php
// app/Http/Controllers/Admin/ServiceController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/services'), $imageName);
            $data['image'] = $imageName;
        }

        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                unlink(public_path('images/services/' . $service->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/services'), $imageName);
            $data['image'] = $imageName;
        }

        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            unlink(public_path('images/services/' . $service->image));
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully');
    }
}