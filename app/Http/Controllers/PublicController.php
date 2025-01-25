<?php
// app/Http/Controllers/PublicController.php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Work;
use Illuminate\Http\Request;



class PublicController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get();
        $works = Work::with(['service'])->latest(6)->take(6)->get();
        $articles = Article::latest(4)->take(4)->get();
        
        return view('public.home', compact('services', 'works', 'articles'));
    }

    public function services()
    {
        $services = Service::latest()->paginate(10);
        return view('public.services', compact('services'));
    }

    public function show(Service $service)
{
    $services = Service::all();
    $relatedServices = Service::where('id', '!=', $service->id)
        ->take(3)
        ->get();
    
    return view('services.show', compact('service', 'relatedServices','services'));
}
    
    public function works(Request $request)
    {
        $services = Service::all();
        $works = Work::with(['service'])
        ->when($request->service, function($query) use ($request) {
            return $query->where('service_id', $request->service);
        })
        ->latest()
        ->paginate(9);
        
        return view('public.works', compact('works', 'services'));
    }
    
    public function workShow($id)
    {
    $services = Service::all();
    $work = Work::with(['service'])->findOrFail($id);
    
    $relatedWorks = Work::with(['service'])
        ->where('id', '!=', $work->id)
        ->where('service_id', $work->service_id) // Menggunakan service_id sebagai relasi
        ->latest()
        ->take(3)
        ->get();
        
        return view('public.works.show', compact('work', 'relatedWorks','services'));
    }
    public function articles()
    {
        $services = Service::all();
        $articles = Article::latest()->paginate(5);
        return view('public.articles', compact('articles','services'));
    }

    

    public function articleShow($slug)
    {
        $services = Service::all();
        $article = Article::findOrFail($slug);
        return view('public.articles.show', compact('article','services'));
    }

    public function faqs()
    {
        $services = Service::all();
        $faqs = Faq::all();
        return view('public.faqs', compact('faqs','services'));
    }
}