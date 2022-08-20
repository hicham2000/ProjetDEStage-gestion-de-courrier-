<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use App\Models\Poste;
use App\Models\statut;
use Illuminate\Http\Request;



class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $postes = Poste::orderBy('name','ASC')->get();


        return view('Courrier')->with('postes',$postes);
        //
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

    public function generateBarcodeNumber() {
        $number = rand(10000000,99999999); //better than rand()

        //call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number)) {
            return $this->generateBarcodeNumber();
        }

        //otherwise, it's valid and can be used
        return $number;
    }

    public function barcodeNumberExists($number) {
        //query the database and return a boolean
        //for instance, it might look like this in Laravel
        return Courrier::where('tracking_number',$number)->exists();
    }

    public function store(Request $request)
    {
        //
        if ($request->tracking_number == ""){
            $track = 'LD'.$this->generateBarcodeNumber().'MA';
        }
        else{
            $track= strtoupper($request->tracking_number);
        }
        $id = auth()->user()->id;
        $sitedepart= auth()->user()->agence;
        $courrier = Courrier::insertGetId([
           'expediteur' => $request->expediteur,
           'destinateur' => $request->destinateur,
           'adresse'=> $request->adresse,
           'tracking_number' =>$track,
            'ville_depart' => $sitedepart,
            'ville_arrive' => $request->ville_arrive,
            'agent' => $id,
        ]);
        $agence = auth()->user()->agence;

        $poste = Poste::find($agence);

       $statut_text = 'Envoi arrivé au centre : '. $poste->name;



        statut::create([
            'id_courrier'=> $courrier,
            'statut_text' => $statut_text,
            'statut_id' => 1,

        ]);



        return redirect()->route('dashbord');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id = auth()->user()->id;
        $courriers = Courrier::where('agent',$id)->paginate(5);
        return view('AllCourrier')->with('courriers',$courriers);
    }

    public function showAdmin()
    {
        //
        $courriers = Courrier::paginate(5);
        return view('AllCourrierAdmin')->with('courriers',$courriers);
    }






public function showDetails($id){

    $iduser = auth()->user()->id;
    $courrier = Courrier::find($id);


        return view('courrierdetails')->with('courrier',$courrier);



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

        $courrier = Courrier::find($id);

        if(!$courrier){
            return redirect()->route('show.courrier');
        }

        else{
            $postes = Poste::orderBy('name','ASC')->get();
            return view('editcourrier')->with('courrier',$courrier)->with('postes',$postes);
        }
    }

    public function editAdmin($id)
    {
        //

        $courrier = Courrier::find($id);

        if(!$courrier){
            return redirect()->route('show.admin.courrier');
        }

        else{
            $postes = Poste::orderBy('name','ASC')->get();
            return view('editcourrieradmin')->with('courrier',$courrier)->with('postes',$postes);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecourrier(Request $request, $id)
    {
        $iduser = auth()->user()->id;
        $courrier = Courrier::where('agent',$iduser)->find($id);
        if(!$courrier){
            return redirect()->route('show.courrier');
        }

        else{

            $courrier->expediteur = $request->expediteur;
            $courrier->destinateur = $request->destinateur;
            $courrier->adresse = $request->adresse;
            $courrier->tracking_number = $request->tracking_number;
            $courrier->ville_arrive = $request->ville_arrive;

            $courrier->save();
            return redirect()->route('show.courrier');
        }


        //
    }

    public function updatecourrierAdmin(Request $request, $id)
    {

        $courrier = Courrier::find($id);
        if(!$courrier){
            return redirect()->route('show.admin.courrier');
        }

        else{

            $courrier->expediteur = $request->expediteur;
            $courrier->destinateur = $request->destinateur;
            $courrier->adresse = $request->adresse;
            $courrier->tracking_number = $request->tracking_number;
            $courrier->ville_arrive = $request->ville_arrive;

            $courrier->save();
            return redirect()->route('show.admin.courrier');
        }


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
        $courrier = Courrier::find($id);
        if(!$courrier){
            return redirect()->route('show.courrier');
        }
        else{
            $courrier->delete();
            return redirect()->route('show.courrier');
        }
    }

    public function destroyadmin($id)
    {
        //
        $courrier = Courrier::find($id);
        if(!$courrier){
            return redirect()->route('show.admin.courrier');
        }
        else{
            $courrier->delete();
            return redirect()->route('show.admin.courrier');
        }
    }
}
