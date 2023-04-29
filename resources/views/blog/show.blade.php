@extends('layouts.app')
@section('title', 'Blog - Welcome')
@section('content')
<div class="row mt-5">
    <div class="col-12">
        <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm">Return</a>
        <h2 class="display-8 pt-3">
            {{ app()->getLocale() === 'fr' ? $blogPost->title_fr : $blogPost->title }}
        </h2>
        <hr>
        {!! app()->getLocale() === 'fr' ? $blogPost->body_fr : $blogPost->body !!}
        <p>
            Author: {{ $blogPost->blogHasUser->name }}
        </p>
        <hr>
    </div>
    @if ($blogPost->files)
    <div class="row">
        <div class="col-12">
            <h4 class="my-4">{{ __('Attached Files') }}</h4>
            @foreach($blogPost->files as $file)
                <a href="{{ route('blog.download', ['id' => $blogPost->id, 'file_id' => $file->id]) }}" class="btn btn-primary">{{ app()->getLocale() === 'fr' ? $file->titre_fr : $file->titre }} - {{ $file->filename }}</a>
            @endforeach
        </div>
    </div>
@endif
</div>

<div class="row text-center mb-5">
    <div class="col-md-4">
        <a href="{{ route('blog.show.pdf', $blogPost->id) }}" class="btn btn-warning btn-sm">PDF</a>
    </div>
    @if ($blogPost->blogHasUser->id === Auth::id())
    <div class="col-md-4">
        <a href="{{ route('blog.edit', $blogPost->id) }}" class="btn btn-success btn-sm">Edit</a>
    </div>
    <div class="col-md-4">
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete">Delete</button>
    </div>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the blog: {{ $blogPost->title }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection