@extends('layouts.app')
@section('title', 'Student - Modifier')
@section('content')
<section class="projects-section bg-light" id="projects">    
<div class="container mt-20">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                    </div>
                                    <h5 class="user-name">{{$schoolStudent->nom}}</h5>
                                    <h6 class="user-email">{{$schoolStudent->email}}</h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form method="post">
                                @csrf
                                @method('put')
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Information Personelle</h6>
                                
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <strong>Nom Complet</strong>
                                    <input type="text" class="form-control" id="fullName" name="nom" value="{{$schoolStudent->nom}}">
                                    
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="text" class="form-control" id="fullName" name="email" value="{{$schoolStudent->email}}">
                                    <p>{{$schoolStudent->email}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <strong>Date de Naissance</strong>
                                    <input type="text" class="form-control" id="fullName" name="date_naissance" value="{{$schoolStudent->date_naissance}}">
                                    <p>{{$schoolStudent->date_naissance}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <strong>Phone</strong>
                                    <input type="text" class="form-control" id="fullName" name="phone" value="{{$schoolStudent->phone}}">
                                    <p>{{$schoolStudent->phone}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <strong>Adresse</strong>
                                    <input type="text" class="form-control" id="fullName" name="adresse" value="{{$schoolStudent->adresse}}">
                                    
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <strong>Ville</strong>
                                    <div class="col"><select class="form-control " name="ville_id" >
                                
                                    @foreach ($cities as $city)
                                    @if($schoolStudent->studentHasCity->nom == $city):
                                        <option value="{{$city->id}}" selected>{{$city->nom}} </option>
                                    @else
                                        <option value="{{$city->id}}">{{$city->nom}} </option>
                                    @endif
                                    @endforeach
                                </select></div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <a href="/maisonneuve/{{$schoolStudent->id}}"><button type="button"   class="btn btn-secondary">retour</button></a> 
                                   <input  type="submit" value="Enregistrer" class="btn btn-primary">
                                    
                                </div>
                            </div>
                        </div>  
                        </form>         
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection