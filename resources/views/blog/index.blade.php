@extends('layouts.app')
@section('content')
    <div class="latest-posts container py-5">
        <a class="btn-add-post fs-4 position-fixed text-center text-white " href="{{ url('blog/create') }}"><i
                class="fas fa-plus"></i></i></a>
        <h2 class="fs-1 fw-bolder text-center pb-5">
            @if ($from == 'all')
                All Posts
            @else
                {{ $from[0]['name'] }}
            @endif
        </h2>
        @foreach ($allBlogs as $blog)
            <div class="all-post row mb-5">
                <div class="image col-sm-6 mb-sm-0 mb-4">
                    <img class="img-post d-flex h-100 img-fluid rounded-3 "
                        src="{{ asset('/images_post') }}/{{ $blog->image_path }}">
                </div>
                <div class="post col-sm-6">
                    <h3 class="fs-1 fw-bold text-uppercase">{{ $blog->title }}</h3>
                    <p class="descrption">{{ $blog->post }}</p>
                    <div class="d-flex justify-content-between">
                        <span>By <strong>{{ $blog->user->name }}</strong></span>
                        <span class="date">{{ date('Y-M-D', strtotime($blog->updated_at)) }}</span>
                    </div>
                    <a class="mx-auto d-block text-center d-sm-inline-block fs-6 bg-secondary text-uppercase rounded py-2 mt-3 px-3 text-white"
                        href="/blog/{{ $blog->slug }}">Read More</a>
                </div>
            </div>
        @endforeach
        @if ($allBlogs->count() == 0)
            <div class="alert alert-secondary" role="alert">
                There is no Posts
            </div>
        @endif

    </div>
@endsection
