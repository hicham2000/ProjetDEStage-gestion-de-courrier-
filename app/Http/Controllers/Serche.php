<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\statut;
use Illuminate\Http\Request;
use stdClass;

class Serche extends Controller
{



    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','hello2']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $primaryKey = 'tracking_number';
    public function index(Request $request)
    {
        //

        $courrier = Courrier::where('tracking_number',$request->tracking_number)->first();

        $help = true;

        if($courrier == null){
            $help = false;


            return view('Search')->with('request',$request)->with('help',$help);
        }

        else{
            $coli = Courrier::where('tracking_number',$request->tracking_number)->get();
            $statuts = statut::where('id_courrier',$coli[0]->id)->get();


            return view('Search')->with('statuts',$statuts)->with('request',$request)->with('help',$help);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
