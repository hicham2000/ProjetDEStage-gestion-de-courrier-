
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-4">update Courrier</div>

                    <div class="card-body">
                        <!-- Material form group -->
                        <form method="post" action="{{route('courrier.update.store',$courrier->id)}}">
                        @csrf
                        <!-- Material input -->
                            <div class="form-outline mb-4 ">
                                <input type="text" id="form12" name="expediteur" class="form-control" value="{{$courrier->expediteur}}"/>
                                <label class="form-label" for="form12" >Expediteur</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form12" name="destinateur" class="form-control" value="{{$courrier->destinateur}}" />
                                <label class="form-label"  for="form12">Destinateur</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form12" name="adresse" class="form-control" value="{{$courrier->adresse}}" />
                                <label class="form-label"  for="form12">Adresse</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="form12" name="tracking_number" class="form-control" value="{{$courrier->tracking_number}}"/>
                                <label class="form-label"  for="form12">Code de suivi (optionel)</label>
                            </div>

                            <div class="mb-4 "  id="agence">
                                <label class="form-label">site d'arrivée</label>

                                <select class="form-select" name="ville_arrive" aria-label="Default select example">
                                    <option selected></option>
                                    @foreach($postes as $poste)
                                        <option data="{{$poste->id}}" value="{{$poste->id}}">{{$poste->name}}</option>
                                    @endforeach


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
    <script>

        let agence = document.querySelector("option[data='{{$courrier->ville_arrive}}']");
        agence.setAttribute('selected','');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


@endsection
