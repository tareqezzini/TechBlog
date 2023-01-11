@extends('layouts.app')
@section('content')
    <div class="latest-posts container py-5">
        <h2 class="fs-1 fw-bolder text-uppercase text-center pb-5">{{ $post->title }}</h2>
        <div class="row mb-5">
            <div class="image col-sm-10 mb-sm-0 mb-4 mx-auto">
                <img class="img-post d-flex h-100 img-fluid rounded-3 "
                    src="{{ asset('/images_post') }}/{{ $post->image_path }}">
            </div>
            <div class="post col-sm-10 mx-auto mt-2">
                <p class="descrption fs-5">{{ $post->post }}</p>
                <div class="d-flex justify-content-between">
                    <span>By <strong>{{ $post->user->name }}</strong></span>
                    <span class="date">{{ date('Y-M-D', strtotime($post->updated_at)) }}</span>
                </div>
            </div>

            @if ((auth()->user() && auth()->user()->id == $post->user->id) ||
                (auth()->user() && auth()->user()->type_user == 1))
                <div class="control mt-3 d-flex justify-content-center gap-3 ">
                    <a class="btn btn-primary" href="{{ route('blog.edit', $post->slug) }}">Edit</a>
                    <form action="/blog/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('Delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endif
        </div>

    </div>
@endsection
