<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agents = User::where('is_admin',0)->where('is_facteur',0)->paginate(5);


        return view('Agent')->with('agents',$agents);
    }

    public function Facteur()
    {
        //
        $facteurs = User::where('is_facteur',1)->paginate(5);

        return view('facteur')->with('facteurs',$facteurs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $admin = 0;
        $facteur = 0;

        if((int)$request->user === 1){
            $admin = 1;
        }
        elseif ((int)$request->user === 2){
            $facteur = 1;
        }

        //

       User::create([
        'name' => $request->name,
            'genre' => $request->genre,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'is_admin' => $admin,
            'is_facteur' => $facteur,
            'agence' => $request->agence,
            'zone' => $request->zone,

        ]);

        return redirect()->route('admin.create');
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
    public function update($id)
    {

        $agent = User::where('is_admin',0)->where('is_facteur',0)->find($id);
        if(!$agent){
            return redirect()->route('user.agent');
        }

        else{
            $postes = Poste::orderBy('name','ASC')->get();



            return view('update_agent')->with('agent',$agent)->with('postes',$postes);
        }

        //
    }

    public function updateAgent(Request $request, $id)
    {
        //
        $agent = User::where('is_admin',0)->where('is_facteur',0)->find($id);
        if (!$agent){
            return redirect()->route('user.agent');

        }
        else{

            $agent->name = $request->name;
            $agent->email = $request->email;
            $agent->genre = $request->genre;
            $agent->agence = $request->agence;
            if($request->password != ""){
                $agent->password = Hash::make($request->password);
            }
            else{
                $agent->password = $agent->password;
            }

            $agent->save();
            return redirect()->route('user.agent')->with('message','Pizza updated succefuly ');

        }

    }


    public function update_facteur($id)
    {

        $agent = User::where('is_facteur',1)->find($id);

        if(!$agent){
            return redirect()->route('user.facteur');
        }
        else{
            $postes = Poste::orderBy('name','ASC')->get();



            return view('update_facteur')->with('agent',$agent)->with('postes',$postes);
        }

        //
    }

    public function updateFacteur(Request $request, $id)
    {
        //
        $agent = User::where('is_facteur',1)->find($id);
        if (!$agent){
            return redirect()->route('user.facteur');

        }
        else{

            $agent->name = $request->name;
            $agent->email = $request->email;
            $agent->genre = $request->genre;
            $agent->agence = $request->agence;
            if($request->password != ""){
                $agent->password = Hash::make($request->password);
            }
            else{
                $agent->password = $agent->password;
            }
            $agent->zone =$request->zone;

            $agent->save();
            return redirect()->route('user.facteur')->with('message','Pizza updated succefuly ');

        }

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
        $user = User::find($id);
        $user->delete();
        return redirect()->back();


    }
}
