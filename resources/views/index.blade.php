@extends('layouts.app')
@section('content')
    <div class="hero">
        <div class="info container text-center">
            <h1 class=" fs-1 text-uppercase fw-bold text-white">WELCOME TO MY BLOG</h1>
            <a class="fw-bold fs-4 text-uppercase border mx-auto rounded py-2 px-3 text-white" href="">Start
                Reading</a>
        </div>
    </div>
    <div class="latest-posts container py-5">
        <div class="row">
            @php
                $post = App\Models\Post::first();
                
            @endphp

            <div class="image col-sm-6 mb-sm-0 mb-4">
                <img class="img-post d-flex h-100 img-fluid rounded-3 "
                    src="{{ asset('/images_post') }}/{{ $post->image_path }}">
            </div>
            <div class="post col-sm-6">
                <h3 class="fs-1 fw-bold text-uppercase">{{ $post->title }}</h3>
                <p class="descrption">
                    {{ $post->post }}
                </p>
                <div class="d-flex justify-content-between">
                    <span>By <strong>{{ $post->user->name }}</strong></span>
                    <span class="date">{{ date('Y-M-D', strtotime($post->updated_at)) }}</span>
                </div>
                <a class="mx-auto d-block text-center d-sm-inline-block fs-6 bg-secondary text-uppercase rounded py-2 mt-3 px-3 text-white"
                    href="/blog/{{ $post->slug }}">Read More</a>
            </div>
        </div>
    </div>
    <div class="cats py-5">
        <div class="container">
            <h3 class="fs-1 fw-bold text-center text-white py-4 text-uppercase">Categories blogs</h3>
            <div class="row">
                <div class="col-sm-3">
                    <h4 class="text-white text-center">UX Design</h4>
                    <i class="fs-1 d-block py-4 text-center text-white fas fa-pencil-ruler"></i>
                </div>
                <div class="col-sm-3">
                    <h4 class="text-white text-center">Programming</h4>
                    <i class="fs-1 d-block py-4 text-center text-white fas fa-code"></i>
                </div>
                <div class="col-sm-3">
                    <h4 class="text-white text-center">Graphic Design</h4>
                    <i class="fs-1 d-block py-4 text-center text-white fas fa-pen-nib"></i>
                </div>
                <div class="col-sm-3">
                    <h4 class="text-white text-center">Front-End</h4>
                    <i class="fs-1 d-block py-4 text-center text-white fas fa-laptop-code"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="recent-post container py-5">
        <div class="tilte py-5">
            <h1 class="fs-1 fw-bold text-center text-uppercase">Recent Posts</h1>
            <p class="text-center fs-5">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, aut nisi quas natus
                amet voluptate dolorum explicabo necessitatibus velit voluptates dolore possimus laborum commodi repellendus
                repellat
                asperiores omnis a autem. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, aut nisi quas
                natus amet voluptate dolorum explicabo necessitatibus velit voluptates dolore possimus laborum commodi
                repellendus repellat
                asperiores omnis a autem.
            </p>
        </div>
        <div class="post row ">
            <div class="info-post col-sm-6 p-5">
                <ul class="cat d-flex justify-content-between">
                    <li><a class="bg-white px-3 py-1 rounded" href="">Graphic</a></li>
                    <li><a class="bg-white px-3 py-1 rounded" href="">Front-End</a></li>
                    <li><a class="bg-white px-3 py-1 rounded" href="">UX Design</a></li>
                    <li><a class="bg-white px-3 py-1 rounded" href="">Programming</a></li>
                </ul>
                <p class="text-white-50 fs-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, aut nisi
                    quas
                    natus amet voluptate
                    dolorum explicabo necessitatibus velit voluptates dolore possimus laborum commodi repellendus repellat
                    asperiores omnis a autem.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, aut nisi
                    quas
                    natus amet voluptate
                    dolorum explicabo necessitatibus velit voluptates dolore possimus laborum commodi repellendus repellat
                    asperiores omnis a autem.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, aut nisi
                    quas
                    natus amet voluptate
                    dolorum explicabo necessitatibus velit voluptates dolore possimus laborum commodi repellendus repellat
                    asperiores omnis a autem.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, aut nisi
                    quas
                    natus amet voluptate.</p>
                <a class="mx-auto d-block text-center d-sm-inline-block fs-6 border text-uppercase rounded py-2 mt-3 px-3 text-white"
                    href="">Read More</a>
            </div>
            <div class="image-post col-sm-6 p-0">
                <img class="img-post d-flex h-100 img-fluid " src="{{ asset('/img/recent.jpg') }}">
            </div>
        </div>
    </div>
@endsection
