
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-4">Update Postman</div>

                    <div class="card-body">
                        <!-- Material form group -->
                        <form method="post" action="{{route('user.update.facteur',$agent->id)}}">
                        @csrf
                        <!-- Material input -->
                            <div class="form-outline mb-4 ">
                                <input type="text" id="form12" name="name" class="form-control" value="{{$agent->name}}" />
                                <label class="form-label" for="form12" >Username</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form12" name="email" class="form-control" value="{{$agent->email}}" />
                                <label class="form-label"  for="form12">Email</label>
                            </div>
                            <div class="form-outline mb-4">
                                <i class="fas fa-exclamation-circle trailing"></i>
                                <input type="text" name="password" id="form1"  class="form-control form-icon-trailing" />
                                <label class="form-label" for="form1">Password(optionel)</label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="genre" value="Homme"  id="flexRadioDefault1"  />
                                <label class="form-check-label" for="flexRadioDefault1"> Homme </label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="genre" value="Femme" id="flexRadioDefault2" />
                                <label class="form-check-label" for="flexRadioDefault2"> Femme </label>
                            </div>



                            <div class="mb-4 "  id="agence">
                                <label class="form-label">Agence</label>

                                <select class="form-select" name="agence" aria-label="Default select example">

                                    @foreach($postes as $poste)
                                        <option dataAgence="{{$poste->id}}" value="{{$poste->id}}">{{$poste->name}}</option>
                                    @endforeach



                                </select>
                            </div>

                            <div class="mb-4 " id="zone">
                                <label class="form-label">Zone</label>
                                <select class="form-select" name="zone">
                                    <option selected></option>
                                    <option dataZone="1" value="1">Zone Nª1</option>
                                    <option dataZone="2" value="2">Zone Nª2</option>
                                    <option dataZone="3" value="3">Zone Nª3</option>
                                    <option dataZone="4" value="4">Zone Nª4</option>
                                    <option dataZone="5" value="5">Zone Nª5</option>
                                </select>
                            </div>

                            <div class="d-flex w-100 justify-content-center">
                                <button type="submit" class="btn btn-primary ps-3 pe-3 fs-5">Update</button>
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
        let genre = document.querySelectorAll("input[name='genre']");
        if('{{$agent->genre}}' === 'Homme'){
            genre[0].setAttribute('checked','');
        }
        else {
            genre[1].setAttribute('checked','');
        }


        let agence = document.querySelector("option[dataAgence='{{$agent->agence}}']");
        agence.setAttribute('selected','');


        let zone = document.querySelector("option[dataZone='{{$agent->zone}}']");
        zone.setAttribute('selected','');







    </script>

@endsection
