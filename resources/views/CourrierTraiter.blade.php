
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header fs-4">Courriers à traiter (sortant)</div>

                    <div class="card-body">
                        <!-- Material form group -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="fw-bold">#</th>
                                <th scope="col" class="fw-bold">expediteur</th>
                                <th scope="col" class="fw-bold">destinateur</th>
                                <th scope="col" class="fw-bold">site d'arrive</th>
                                <th scope="col" class="fw-bold">tracking_number</th>
                                <th scope="col" class="fw-bold">détails</th>
                                <th scope="col" class="fw-bold">Accepté par le transporteur</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courriers as $key=>$courrier)




                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$courrier->expediteur}}</td>
                                    <td>{{$courrier->destinateur}}</td>
                                    <td>{{$courrier->postearrive->name}}</td>
                                    <td>{{$courrier->tracking_number}}</td>


                                    <td><a class="btn btn-success" href="{{route('show.details',$courrier->id)}}">Détails</a></td>
                                    @if($courrier->state == 1)
                                    <td><a class="btn btn-primary delete " data-bs-toggle="modal" data-bs-target="#edit{{$courrier->id}}">Accepter</a></td>
                                        <div class="modal fade" id="edit{{$courrier->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="edit">Confirm sortir</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a type="button" class="btn btn-primary" href="{{route('courier.traiter.sortant',$courrier->id)}}">Accepter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <td><h5 class="text-danger">Accepté</h5></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            {{$courriers->links()}}
                        </div>
                        <!-- Material form group -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
