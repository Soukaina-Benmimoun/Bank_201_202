<?php

namespace App\Http\Controllers;

use App\Models\Virement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $virements = $user->virements()->orderBy('created_at', 'desc')->get();
        return view('virements.index', compact('virements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where([['id', '!=', auth()->id() ],['is_admin', '!=','1']])->get();
        return view('virements.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0',
            'motif' => 'required|string|max:255',
            'beneficiaire_id'=> 'required'
        ]);
        $userAuth = auth()->user();
        $soldeActuel = $userAuth->solde;
    
        if ($soldeActuel < $request->montant) {
            return redirect()->back()->with('error', 'Solde insuffisant pour effectuer ce retrait.');
        }
        $virement = new Virement([
            'montant' => $request->montant,
            'motif' => $request->motif,
            'beneficiaire_id' => $request->beneficiaire_id,
            'user_id' => auth()->id(),
        ]);
        $userAuth->update(['solde' => $soldeActuel - $request->montant]);

        $virement->save();
        $user = User::find($request->beneficiaire_id);
        $user->update(['solde'=>$user->solde + $request->montant]);

        return redirect()->route('virements.index')->with('success', 'Virement créé avec succès.');
    }
    public function createRetait(){
        return view('virements.createRetait');
    }
    public function storeRetait(Request $request){
        $request->validate([
            'montant' => 'required|numeric|min:0',
        ]);
    
        $user = auth()->user();
        $soldeActuel = $user->solde;
    
        if ($soldeActuel < $request->montant) {
            return redirect()->back()->with('error', 'Solde insuffisant pour effectuer ce retrait.');
        }
    
        $user->update(['solde' => $soldeActuel - $request->montant]);
    
        return redirect('/dashboard')->with('success', 'Retrait effectué avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Virement $virement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Virement $virement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Virement $virement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Virement $virement)
    {
        //
    }
}
