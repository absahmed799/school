@extends('layouts.app')
@section('title', 'Blog - Create')
@section('content')
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    Ajouter un article
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form method="post" enctype="multipart/form-data">
                    
                    @csrf
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="title">Titre du message</label>
                                    <input type="text" id="title" name="title" class="form-control" >
                                </div>
                                <div class="control-grup col-12">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="body"></textarea>
                                </div>
                                
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="title">Titre du message</label>
                                    <input type="text" id="title_fr" name="title_fr" class="form-control" >
                                </div>
                                <div class="control-grup col-12">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message_fr" name="body_fr"></textarea>
                                </div>
                                
                        </div>
                        <div class="form-group row">
                       
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                            <hr>
 entrez le titre en francais :<input type="text" class="form-control" name="titre_fr" >
                        entrez le titre en anglais :<input type="text" class="form-control" name="titre" >
                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control-file @error('file') is-invalid @enderror" name="file">

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>



        
</div>


@endsection