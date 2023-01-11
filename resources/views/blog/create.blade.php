@extends('layouts.app')
@section('content')
    <div class="latest-posts container py-5">
        <h2 class="fs-1 fw-bolder text-center pb-5">Add New Post</h2>
        <div class="row mb-5">
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title Of The Post</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                        placeholder="Titel">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Text Of Post</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="post_text"></textarea>
                </div>
                <select class="form-select" aria-label="Default select example" name="cat">
                    <option value="0" selected>Chose The Category....</option>
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Post Image</label>
                    <input class="form-control" type="file" id="formFile" name="img_post">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Add New Post</button>
                </div>
            </form>
        </div>

    </div>
@endsection
