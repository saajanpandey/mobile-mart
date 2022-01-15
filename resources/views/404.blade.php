@extends('frontend.layout')
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>404 Page Not Found</h3>
            <ul>
                <li><a href="{{route('first.page')}}">Home</a></li>
                <li class="active">404 Page NotFound</li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-us ptb-95">
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
        <a href="{{route('first.page')}}">Back to Home</a>
    </div>
</div>
@endsection
