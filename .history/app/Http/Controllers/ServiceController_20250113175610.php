<?php

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
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
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan ke folder storage/app/public/works
            $file->storeAs('public/services', $filename);
            // Simpan path relatif ke database
            $validatedData['image'] = 'services/' . $filename;
        }

        Service::create($validatedData);
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully');
    }
}