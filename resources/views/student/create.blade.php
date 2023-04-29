@extends('layouts.app')
@section('title', 'Student - Create')
@section('content')

@php $lang =  session('locale') @endphp
         <!-- Signup-->
         <section class="signup-section" id="signup">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">@lang('lang.text_fill')</h2>
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form method="post" class="form-signup" >
                        @csrf
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col"><input class="form-control"  type="text" name="nom" placeholder="@lang('lang.text_sname')"  /></div>
                                <div class="col"><input class="form-control"  type="email" name="email" placeholder="@lang('lang.text_semail')"  /></div>
                                
                            </div>
                            <div class="row input-group-newsletter mt-3">
                                <div class="col"><input class="form-control"  type="date" name="date_naissance"   /></div>
                                <div class="col"><select class="form-control " name="ville_id" >
                                <option value="#"selected>Choisi ton pays</option>
                                    @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->nom}} </option>
                                    @endforeach
                                </select></div>
                                
                            </div>
                            <div class="row input-group-newsletter mt-3">
                                <div class="col"><input class="form-control"  type="text" name="adresse" placeholder="Entrez l'address' ."  /></div>
                                <div class="col"><input class="form-control"  type="phone" name="phone" placeholder="Entrez le numéro de Tel."  /></div>
                                <div class="col-auto"><button class="btn btn-primary "  type="submit">Ajouter L'étudient</button></div>
                            </div>
                           
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection