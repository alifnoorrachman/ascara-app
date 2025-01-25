@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Dashboard</h1>
        </div>
    </div>

    <div class="row">
        <!-- Dashboard Cards -->
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-1 border-dark rounded-lg p-2 mb-4">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="text-muted text-uppercase card-label">Total Services</div>
                        <div class="h2 mt-2 mb-0">{{ App\Models\Service::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-1 border-dark rounded-lg p-2 mb-4">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="text-muted text-uppercase card-label">Total Works</div>
                        <div class="h2 mt-2 mb-0">{{ App\Models\Work::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-1 border-dark rounded-lg p-2 mb-4">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="text-muted text-uppercase card-label">Total Articles</div>
                        <div class="h2 mt-2 mb-0">{{ App\Models\Article::count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-1 border-dark rounded-lg p-2 mb-4">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="text-muted text-uppercase card-label">Total FAQs</div>
                        <div class="h2 mt-2 mb-0">{{ App\Models\Faq::count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-1 border-dark rounded-lg p-2">
                <div class="card-header border-bottom">
                    <h6 class="mb-0 fw-semibold">Recent Activities</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Latest Works</th>
                                    <th>Latest Articles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @foreach(App\Models\Work::latest()->take(5)->get() as $work)
                                            <div class="mb-3">
                                                <div class="text-dark">{{ $work->title }}</div>
                                                <small class="text-muted">
                                                    {{ $work->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach(App\Models\Article::latest()->take(5)->get() as $article)
                                            <div class="mb-3">
                                                <div class="text-dark">{{ $article->title }}</div>
                                                <small class="text-muted">
                                                    {{ $article->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
