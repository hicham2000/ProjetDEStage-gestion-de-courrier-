
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header fs-4">All Postman</div>

                    <div class="card-body">
                        <!-- Material form group -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">genre</th>
                                <th scope="col">email</th>
                                <th scope="col">Agence</th>
                                <th scope="col">zone</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($facteurs as $key => $facteur)

                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$facteur->name}}</td>
                                    <td>{{$facteur->genre}}</td>
                                    <td>{{$facteur->email}}</td>
                                    <td>{{$facteur->poste->name}}</td>
                                    <td>Zone º{{$facteur->zone}}</td>
                                    <td><a class="btn btn-danger delete " data-bs-toggle="modal" data-bs-target="#update{{$facteur->id}}">Delete</a></td>

                                    <div class="modal fade" id="update{{$facteur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="update">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a type="button" class="btn btn-danger" href="{{route('user.delete',$facteur->id)}}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td><a class="btn btn-primary delete " data-bs-toggle="modal" data-bs-target="#edit{{$facteur->id}}" >Edit</a></td>

                                    <div class="modal fade" id="edit{{$facteur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit">Confirm edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a type="button" class="btn btn-primary" href="{{route('facteur.update', $facteur->id)}}">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$facteurs->links()}}
                        </div>

                        <!-- Material form group -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
