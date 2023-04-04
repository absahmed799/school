@extends('layouts.app')
@section('title', 'Student - Pagination')
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-3 mt-3">
                {{ config('app.name')}}
            </h1>
        </div>
        <hr>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title}}</td>
                        <td>{{ $blog->blogHasUser->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$blogs}}
        </div>
    </div>
@endsection


<!-- Projects-->
<section class="projects-section bg-light" id="projects">
            <div class="container mt-3 mb-4">
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                                <table class="table manage-candidates-top mb-0">
                                    <thead>
                                        <tr>
                                            <th>Candidate Name</th>
                                            <th class="text-center">Status</th>
                                            <th class="action text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr class="candidates-list">
                                            <td class="title">
                                                <div class="thumb">
                                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                                </div>
                                                <div class="candidate-list-details">
                                                    <div class="candidate-list-info">
                                                        <div class="candidate-list-title">
                                                            <h5 class="mb-0"><a href="#">Brooke Kelly</a></h5>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="candidate-list-favourite-time text-center">
                                                <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-heart"></i></a>
                                                <span class="candidate-list-time order-1">Student</span>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                    <li><a href="#" class="text-primary" data-toggle="tooltip" title="" data-original-title="view"><i class="far fa-eye"></i></a></li>
                                                    <li><a href="#" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
                                                    <li><a href="#" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>
               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </section>