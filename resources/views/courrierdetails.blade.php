
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header fs-4">Détails</div>

                    <div class="card-body">
                        <!-- Material form group -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>

                            <tbody>


                            <div class="d-flex w-100 justify-content-center">
                                <div class="mb-3">{!! DNS2D::getBarcodeHTML("$courrier->tracking_number", 'QRCODE') !!}</div>
                            </div>





                                <tr>
                                    <th scope="row" colspan="1" class="fs-6 fw-bold">expediteur :</th>
                                    <th scope="row" colspan="6">{{$courrier->expediteur}}</th>

                                </tr>
                                <tr>
                                    <th scope="row" colspan="1" class="fs-6 fw-bold">destinateur :</th>
                                    <th scope="row" colspan="6">{{$courrier->destinateur}}</th>

                                </tr><tr>
                                    <th scope="row" colspan="1" class="fs-6 fw-bold">adresse :</th>
                                    <th scope="row" colspan="6">{{$courrier->adresse}}</th>

                                </tr><tr>
                                    <th scope="row" colspan="1" class="fs-6 fw-bold">tracking_number :</th>
                                    <th scope="row" colspan="6">{{$courrier->tracking_number}}</th>

                                </tr><tr>
                                    <th scope="row" colspan="1" class="fs-6 fw-bold">site de depart :</th>
                                    <th scope="row" colspan="6">{{$courrier->postedepart->name}}</th>

                                </tr><tr>
                                    <th scope="row" colspan="1" class="fs-6 fw-bold">site d'arrive :</th>
                                    <th scope="row" colspan="6">{{$courrier->postearrive->name}}</th>

                                </tr><tr>
                                    <th scope="row" colspan="1" class="fs-6 fw-bold">effectuer par :</th>
                                    <th scope="row" colspan="6">{{$courrier->user->name}}</th>

                                </tr><tr>
                                    <th scope="row" colspan="1" class="fs-6 fw-bold">Tournée de distribution</th>
                                    <th scope="row" colspan="6">{{$courrier->zone}}</th>

                                </tr>

                            </tbody>

                        </table>

                        <!-- Material form group -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
