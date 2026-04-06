@extends('website.layouts.main')
@section('title')
404 Page Not Found
@endsection
@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center text-center">

        <!-- Image -->
        <div class="col-md-6 mb-4">
            <img src="{{ asset('assets/front/images/404.avif') }}" 
                 class="img-fluid" 
                 alt="404 Not Found">
        </div>

        <!-- Content -->
        <div class="col-md-6">
            <h1 class="display-4 fw-bold text-danger">
                <i class="bi bi-exclamation-triangle-fill"></i> 404
            </h1>

            <h3 class="mb-3">Oops! Page Not Found</h3>

            <p class="text-muted mb-4">
                The page you are looking for might have been removed,
                had its name changed, or is temporarily unavailable.
            </p>

            <a href="{{ url('/') }}" class="btn btn-primary px-4 me-2">
                <i class="bi bi-house-door-fill"></i> Go Home
            </a>

            <a href="{{ url('/') }}" class="btn btn-outline-secondary px-4">
                <i class="bi bi-journal-text"></i> Read Blogs
            </a>
        </div>
    </div>
</div>
@endsection
