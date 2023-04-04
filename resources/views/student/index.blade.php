@extends('layouts.app')
@section('title', 'Student - Welcome')
@section('content')



<!-- Projects-->
<section class="projects-section bg-light" id="projects">
    <div class="container">
        @if(session('success'))
        <div class="row justify-content-center mt-2 mb-1">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show">{{ session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
        @yield('content')
    </div>
            <div class="container mt-3 mb-4">
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="row">
                    <div class="row">
                        <div class="col-12 text-center pt-3">
                            <h1 class="display-3 mt-3">
                                {{ config('app.name')}}
                            </h1>
                        </div>
                        <hr>
                        

                        </div>
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
                                    @foreach($students as $student)
                                        <tr class="candidates-list">
                                            <td class="title">
                                                <div class="thumb">
                                                <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                                                </div>
                                                <div class="candidate-list-details">
                                                    <div class="candidate-list-info">
                                                        <div class="candidate-list-title">
                                                            <h5 class="mb-0"><a href="{{route('student.show', $student->id)}}">{{$student->nom}}</a></h5>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="candidate-list-favourite-time text-center">
                                                <a class="candidate-list-favourite order-2 text-danger" href="#"><i class="fas fa-heart"></i></a>
                                                <span class="candidate-list-time order-1">student</span>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                                    <li><a href="{{route('student.show', $student->id)}}" class="text-primary" data-toggle="tooltip" title="" data-original-title="view"><i class="far fa-eye"></i></a></li>
                                                    <li><a href="{{route('student.edit', $student->id)}}" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
                                                    <li><button type="button"  data-bs-toggle="modal" data-bs-target="#modalDelete{{$student->id}}" ><i class="far fa-trash-alt"></i></button>
                                                           
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        
                                     
                                        @endforeach
                                    </tbody>
                                </table>
               
                            </div>
                        </div>
                        {{$students}}
                    </div>
                </div>
            </div>
                
        </section>
        @foreach($students as $student)
      <!-- Modal -->
<div class="modal fade" id="modalDelete{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you to delete the Student : {{ $student->nom }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form method="post" action="{{route('student.show', $student->id)}}" >
                @csrf
                @method('delete')
                <button class="btn btn-danger"> Effacer </button>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach   
@endsection