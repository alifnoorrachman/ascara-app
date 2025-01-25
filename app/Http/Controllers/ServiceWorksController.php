<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceWorksController extends Controller
{
    public function show(Service $service)
    {
        $works = $service->works()->paginate(12);
        $services = Service::all();
        return view('services.works', compact('service', 'works','services'));
    }
}