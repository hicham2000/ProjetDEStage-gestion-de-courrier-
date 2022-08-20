
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header fs-4">Courriers à traiter (entrant)</div>

                    <div class="card-body">
                        <!-- Material form group -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="fw-bold">#</th>
                                <th scope="col" class="fw-bold">expediteur</th>
                                <th scope="col" class="fw-bold">destinateur</th>
                                <th scope="col" class="fw-bold">site de départ</th>
                                <th scope="col" class="fw-bold">tracking_number</th>
                                <th scope="col" class="fw-bold">détails</th>
                                <th scope="col" class="fw-bold">Envoi à récupérer</th>



                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courriers as $key=>$courrier)




                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$courrier->expediteur}}</td>
                                    <td>{{$courrier->destinateur}}</td>
                                    <td>{{$courrier->postedepart->name}}</td>
                                    <td>{{$courrier->tracking_number}}</td>


                                    <td><a class="btn btn-success" href="{{route('show.details',$courrier->id)}}">Détails</a></td>
                                    @if($courrier->state == 2)
                                    <td><a class="btn btn-primary delete " data-bs-toggle="modal" data-bs-target="#edit{{$courrier->id}}">récupérer</a></td>
                                        <div class="modal fade" id="edit{{$courrier->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="edit">Confirm récupération</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" action="{{route('courier.traiter.entrant.store',$courrier->id)}}">
                                                    <div class="modal-body">

                                                            @csrf
                                                            <h5 class="fw-bold">destinateur :</h5>
                                                            <p>{{$courrier->destinateur}}</p>
                                                            <h5 class="fw-bold">Adresse :</h5>
                                                            <p>{{$courrier->adresse}}</p>
                                                            <div class="mb-4 " id="zone">
                                                                <h5 class="fw-bold">tournée de destribution</h5>
                                                                <select class="form-select" name="zone">
                                                                    <option selected></option>
                                                                    <option value="1">tournée Nª1</option>
                                                                    <option value="2">tournée Nª2</option>
                                                                    <option value="3">tournée Nª3</option>
                                                                    <option value="4">tournée Nª4</option>
                                                                    <option value="5">tournée Nª5</option>
                                                                </select>


                                                            </div>


                                                    </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">récupérer</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <td><h5 class="text-danger">récupéré</h5></td>
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
