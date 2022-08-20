<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <style>
        #home{
            background-color: #17402C;
        }
        #serche{
            border-radius: 25px;
            padding: 12px;
            padding-left: 30px;



        }


    </style>
</head>
<body>
<div id="home" class="vh-100">
    <div class="d-flex">
        <div class="w-50 vh-100 d-flex  justify-content-start  align-items-end">
            <div class="d-flex flex-column ms-5">

                <h2 class="text-white ms-5 fw-bold">Veuillez entrer vorte Code de Suivi</h2>
                <form method="post" action="{{route('Search')}}">
                    @csrf
                    <input id="serche" class="mt-3 mb-3 ms-5 fw-bold w-75" type="text" name="tracking_number"  placeholder="Tracking Number"><br>
                    <button class="ms-5 mb-3 fw-bold btn btn-success rounded-3" type="submit">Search</button>

                </form>
                <div class="mt-5 mb-5 ms-5 ">
                    <h3 class="text-white mb-5 mt-3 fs-1 fw-bold">Login: <a href="{{ route('login') }}" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                            </svg></a></h3>
                </div>
            </div>
        </div>
        <div class="w-50 align-items-end vh-100  d-flex justify-content-end">
            <img src="{{URL::asset('/images/image 3.svg')}} " class="h-75 ">

        </div>
    </div>

</div>
</body>
</html>
