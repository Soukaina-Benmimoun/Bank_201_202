<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', '!=','1')->get(); 
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'solde' => 'nullable',
            'password' => 'required|min:8',
        ]);

        $user = new User([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'solde' => $request->solde,
        ]);

        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('users.edit', compact('user')); 
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'. $id,
            'solde' => 'nullable',
        ]);

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->solde = $request->solde;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user')); // Assurez-vous d'avoir une vue 'users.show'
    }
}
