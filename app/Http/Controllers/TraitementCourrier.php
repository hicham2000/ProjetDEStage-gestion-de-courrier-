<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\Poste;
use App\Models\statut;
use Illuminate\Http\Request;

class TraitementCourrier extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $courriers = Courrier::where('ville_depart',auth()->user()->agence)->paginate(5);

        return view('CourrierTraiter')->with('courriers',$courriers);


    }
    public function indexentrant()
    {


        $courriers = Courrier::where('ville_arrive',auth()->user()->agence)->where('state','!=',1)->paginate(5);

        return view('CourrierTraiterEntrant')->with('courriers',$courriers);


    }
    public function indexfacteur()
    {


        $courriers = Courrier::where('ville_arrive',auth()->user()->agence)->where('zone',auth()->user()->zone)->paginate(5);

        return view('FacteurCourrier')->with('courriers',$courriers);


    }
    public function EnCoursDeLivraison()
    {


        $courriers = Courrier::where('ville_arrive',auth()->user()->agence)->where('zone',auth()->user()->zone)->where('state','>=',4)->paginate(5);

        return view('EnCoursDeLaivrison')->with('courriers',$courriers);


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
        $courrier = Courrier::find($id);

        $courrier->state = 2;
        $courrier->save();


        $agence = auth()->user()->agence;

        $poste = Poste::find($agence);

        $statut_text = 'Envoi sortie de l-agence/centre : '. $poste->name;



        statut::create([
            'id_courrier'=> $id,
            'statut_text' => $statut_text,
            'statut_id' => 2,

        ]);

        return redirect()->route('courier.traiter');
        //
    }

    public function editentrant(Request $request ,$id)
    {
        $courrier = Courrier::find($id);

        $courrier->state = 3;
        $courrier->zone = $request->zone;
        $courrier->save();



        $agence = auth()->user()->agence;

        $poste = Poste::find($agence);

        $statut_text = 'Envoi arrivé à l-agence/centre : '. $poste->name;



        statut::create([
            'id_courrier'=> $id,
            'statut_text' => $statut_text,
            'statut_id' => 3,

        ]);

        return redirect()->route('courier.traiter.entrant');
        //
    }
    public function editentrantfacteur($id)
    {
        $courrier = Courrier::find($id);

        $courrier->state = 4;
        $courrier->save();


        $agence = auth()->user()->agence;

        $poste = Poste::find($agence);

        $statut_text = 'Envoi en cours de livraison : '. $poste->name;



        statut::create([
            'id_courrier'=> $id,
            'statut_text' => $statut_text,
            'statut_id' => 4,

        ]);

        return redirect()->route('courier.traiter.facteur');
        //
    }
    public function editentrantfacteurEnCoursDeLivraison($id)
    {
        $courrier = Courrier::find($id);

        $courrier->state = 5;
        $courrier->save();


        $agence = auth()->user()->agence;

        $poste = Poste::find($agence);

        $statut_text = 'Envoi livré : '. $poste->name;



        statut::create([
            'id_courrier'=> $id,
            'statut_text' => $statut_text,
            'statut_id' => 5,

        ]);

        return redirect()->route('courier.traiter.facteur.EnCoursDeLivraison');
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
