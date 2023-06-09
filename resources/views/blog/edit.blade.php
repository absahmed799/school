@extends('layouts.app')
@section('title', 'Blog - Modifier')
@section('content')
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    Modifierun article
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form method="post">
                    @csrf
                    @method('put')
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">   
                                <div class="control-group col-12">
                                    <label for="title">Titre du message</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ $blogPost->title }}">
                                </div>
                                <div class="control-group col-12">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="body">
                                        {{ $blogPost->body }}
                                    </textarea>
                                </div>
                               
                        </div>
                        <div class="card-body">   
                                <div class="control-group col-12">
                                    <label for="title_fr">Titre du message</label>
                                    <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{ $blogPost->title_fr }}">
                                </div>
                                <div class="control-group col-12">
                                    <label for="message_fr">Message</label>
                                    <textarea class="form-control" id="message_fr" name="body_fr">
                                        {{ $blogPost->body_fr }}
                                    </textarea>
                                </div>
                               
                        </div>
                        <div class="form-group">
                            <label for="file">File:</label>
                            <input type="file" name="file" id="file" value="{{ $blogPost->file_path }}">
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection