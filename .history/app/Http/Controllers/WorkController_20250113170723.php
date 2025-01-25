<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageService;

class WorkController extends Controller
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
        'service_id' => 'required|exists:services,id',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        // Simpan ke folder storage/app/public/works
        $file->storeAs('public/works', $filename);
        // Simpan path relatif ke database
        $validatedData['image'] = 'works/' . $filename;
    }

    Work::create($validatedData);
    return redirect()->route('admin.works.index')
        ->with('success', 'Work created successfully.');
}
}