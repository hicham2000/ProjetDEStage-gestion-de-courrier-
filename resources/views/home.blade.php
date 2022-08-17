
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-4">add user</div>

                    <div class="card-body">
                        <!-- Material form group -->
                        <form method="post" action="{{route('')}}">
                            @csrf
                            <!-- Material input -->
                                <div class="form-outline mb-4 ">
                                    <input type="text" id="form12" class="form-control" />
                                    <label class="form-label" for="form12">Username</label>
                                </div>
                            <div class="form-outline mb-4">
                                    <input type="text" id="form12" class="form-control" />
                                    <label class="form-label" for="form12">Email</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <i class="fas fa-exclamation-circle trailing"></i>
                                    <input type="text" id="form1" class="form-control form-icon-trailing" />
                                    <label class="form-label" for="form1">Password</label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked/>
                                    <label class="form-check-label" for="flexRadioDefault1"> Homme </label>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
                                    <label class="form-check-label" for="flexRadioDefault2"> Femme </label>
                                </div>

                                <div class="btn-group d-flex justify-content-center mb-4">
                                    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked />
                                    <label class="btn btn-secondary" for="option1">Admin</label>

                                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" />
                                    <label class="btn btn-secondary" for="option2">Agent</label>

                                    <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off" />
                                    <label class="btn btn-secondary" for="option3">Facteur</label>
                                </div>
                                <div class="mb-4 d-none"  id="agence">
                                    <label class="form-label">Agence</label>

                                        <select class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                            @foreach($postes as $poste)
                                        <option value="{{$poste->id}}">{{$poste->name}}</option>
                                            @endforeach


                                         </select>
                                </div>

                            <div class="mb-4 d-none" id="zone">
                                <label class="form-label">Zone</label>
                                <select class="form-select">
                                    <option selected></option>
                                    <option value="1">Zone Nª1</option>
                                    <option value="2">Zone Nª2</option>
                                    <option value="3">Zone Nª3</option>
                                    <option value="4">Zone Nª4</option>
                                    <option value="5">Zone Nª5</option>
                                </select>
                            </div>

                            <div class="d-flex w-100 justify-content-center">
                                <input class="btn btn-primary ps-3 pe-3 fs-5" type="submit" value="Add">
                            </div>
                        </form>
                        <!-- Material form group -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
let Admin = document.getElementById('option1');
let Agent = document.getElementById('option2');
let Facteur = document.getElementById('option3');
let agence=document.getElementById('agence');
let zone=document.getElementById('zone');

Agent.onclick = () => {
    agence.classList.remove("d-none");
    zone.classList.add("d-none");
}

Facteur.onclick = () =>{
    agence.classList.remove("d-none");
    zone.classList.remove("d-none");
}

Admin.onclick =() => {
    zone.classList.add("d-none");
    agence.classList.add("d-none");
}


    </script>

@endsection
